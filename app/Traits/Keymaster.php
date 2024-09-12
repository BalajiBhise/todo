<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception ;

trait Keymaster{

    function GetMachineKeyMaster($CorpId, $ProductToken)
    {
        try {
            $Keymaster = DB::table("tbl_token as tn")->join("tbl_organization as org", "org.Id", "tn.org_id")->where("tn.LicKey", $ProductToken)
                ->where("org.CorpId", $CorpId)->select("org.CorpId","org.ValidityInDays", "tn.*")->first();
        } catch (Exception $e) {
            $Keymaster = NULL; 
        }

        return $Keymaster;
    }
    function GetKeyMaster($CorpId, $ProductToken)
    {
        try {
             // if token is empty
             if(empty($ProductToken))
             {
                //get token is not activated and not blocked
                $Keymaster = DB::table("tbl_token as tn")->join("tbl_organization as org", "org.Id", "tn.org_id")->where("org.CorpId", $CorpId)
                                ->where("tn.IsBlock",0)->where("tn.IsActive",0)->first();
             }
             else // if token is not empty
             {
                $Keymaster = $this->GetMachineKeyMaster($CorpId, $ProductToken);
             }
            
        } catch (Exception $e) {
            $Keymaster = NULL;
        }

        return $Keymaster ;
    }

    function IsKeyValid($keydata)
    {
        try {
            $response = "";
            if (!empty($keydata)) {
                if (date("Y-m-d", strtotime($keydata->ExpiredOn)) > date("Y-m-d")) {
                    if ($keydata->IsBlock)
                        $response = "Key is Block";
                    else if (!$keydata->IsActive)
                        $response = "Key is Not Active";
                } else {
                    $response = "Key is Expired";
                }
            } else
                $response = "Invalid Corp Key";
        } catch (Exception $e) {
            $response = "Server error";
        }
        return $response;
    }
}

?>