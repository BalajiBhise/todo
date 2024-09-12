<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ClientLoginController extends Controller
{
    function index()
    {
        return view("Client.Login.login");
    }
    function handlelogin(Request $request)
    {
        try {
            $check = User::where("username", $request->username)->where("password", $request->password)->first();
            if (!empty($check)) {
                if (Auth::guard("web")->attempt(["username" => $request->username, "password" => $request->password])) {
                    return redirect("/dashboard");
                } else {
                    return redirect()->back()->with("error", "Unauthorized User");
                }
            } else {
                return redirect()->back()->with("error", "Please Enter Correct Username and Password");
            }
        } catch (Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
    function logout()
    {
        try {
            Auth::guard('web')->logout();
            return redirect("/")->with('success', 'Logout Successfully...');
        } catch (Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
    function updatePassword(Request $request)
    {
        try {
            $user = User::find(Auth::guard('web')->user()->id);
            $user->password = trim($request->updPass);
            $user->passFlag = 1;
            $user->save();
            return response()->json(["title" => "Done !", "msg" => "Password Updated Successfully.", "type" => "success"]);
        } catch (Exception $th) {
            return response()->json(["title" => "Error !", "msg" => $th->getMessage(), "type" => "error"]);
        }
    }
    #endregion
}
