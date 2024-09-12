<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class EmployeeController extends Controller
{
    function index()
    {
        try {
            $dept = Department::orderBy("deptName")->get();
            return view("Admin.Employee.emp", compact('dept'));
        } catch (Exception $e) {
            //throw $th;
            return view("errors.404");
        }
    }

    function getEmployeeData(Request $request)
    {
        try {
            //code...
            $data = User::leftjoin("department as dept", "dept.id", "users.DeptId")->select("users.id", 'name', "username", "password", "users.created_at", "dept.deptName")->get();
            return view("Admin.Employee.empTable", compact('data'));
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
            //throw $th;
        }
    }
    function saveEmployee(Request $request)
    {
        try {
            $User = User::where("username", $request->username)->first();
            if (empty($User)) {
                $insert = new User();
                $insert->name = $request->EmpName;
                $insert->username = $request->username;
                $insert->password = $this->getRandomString();
                $insert->DeptId = $request->Department;
                $insert->save();
                $this->sendMail($insert);
                return response()->json(["title" => "Done !", "msg" => "Employee Added Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Employee Already Exist", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function getEditUserData(Request $request)
    {
        try {
            $data = User::where("id", $request->id)->first();
            $dept = Department::orderBy("deptName")->get();
            return view("Admin.Employee.editEmp", compact('data', 'dept'));
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function deleteEmployee(Request $request)
    {
        try {
            $delete = User::where("id", $request->id)->delete();
            if ($delete) {
                return response()->json(["title" => "Done !", "msg" => "Employee Deleted Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Employee Not Deleted", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function updateEmployee(Request $request)
    {
        try {
            $update = User::where("id", $request->id)->update([
                "name" => $request->EmpName,
                "username" => $request->username,
                "DeptId" => $request->Department,
                "updated_at" => now()
            ]);
            if ($update) {
                return response()->json(["title" => "Done !", "msg" => "Employee Updated Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Employee Not Updated", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }

    function  sendMail($value)
    {
        try {
            $text = "<p>Dear <strong>" . $value->name . "</strong>,</p>";
            $text .= "<p>You are successfully registerted to TO DO.</p>";
            $text .= "<p>Below are the Login Details :</p>";
            $text .= "<h4>Username: " . $value->username . "</h4>";
            $text .= "<h4>Password:" . $value->password . "</h4>";
            $text .= "<h4><a href='http://localhost/todo/'> Click here to Login</a></h4>";
            $text .= "<p>Thanks ,</p>";
            $text .= "<p>TO DO Management</p>";

            $data = $text;
            $from = 'bhisebalaji2328@gmail.com';
            $mail_title = "TO DO";
            $subject = "TO DO - Registration Successfully Done !";
            $to = $value->username;
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Fill valid To email, please try again.';
                return response()->json([
                    'Status' => false,
                    'Message' => $errors,
                ]);
            }
            if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
                $errors = 'Fill valid From email, please try again.';
                return response()->json([
                    'Status' => false,
                    'Message' => $errors,
                ]);
            }
            if ($from != '' && $data != '' && $mail_title != '' && $subject != '' && $to != '') {
                Mail::send('Email.testmail', array('data' => $data, 'title' => $mail_title), function ($message) use ($to, $mail_title, $from, $subject) {
                    $message->to($to, $mail_title);
                    $message->subject($subject);
                    $message->from($from, $mail_title);
                });
                return response()->json([
                    'Status' => true,
                    'Message' => 'Email Sent Successfully..',
                ]);
            } else {
                return response()->json([
                    'Status' => false,
                    'Message' => 'OOPS! Please Fill Required Field..',
                ]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'Status' => false,
                'Message' => $e->getMessage(),
            ]);
        }
    }

    function getRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}
