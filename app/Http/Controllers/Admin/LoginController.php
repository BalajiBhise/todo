<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\ADMIN;

class LoginController extends Controller
{
    function index()
    {
        try { 
            return view("Admin.login");
        } catch (Exception $th) {
            return view("errors.404");
        }
    }
    function handlelogin(Request $request)
    {
        try {
            $check = ADMIN::where("username", $request->username)->where("password", $request->password)->first();
            if (!empty($check)) {
                if (Auth::guard("ADMIN")->attempt(["username" => $request->username, "password" => $request->password])) {
                    return redirect("admin/employee");
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
            Auth::guard('ADMIN')->logout(); 
            return redirect("/admin")->with('success', 'Logout Successfully...');
        } catch (Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}
