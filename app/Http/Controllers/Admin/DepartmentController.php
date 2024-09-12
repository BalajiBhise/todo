<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    function index()
    {
        try {
            return view("Admin.Department.Dept");
        } catch (Exception $e) {
            return view("errors.404");
        }
    }

    function getDepartmentData(Request $request)
    {
        try {
            //code...
            $data = Department::all();
            return view("Admin.Department.deptTable",compact('data'));
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
            //throw $th;
        }
    }
    function saveDepartment(Request $request)
    {
        try {
            $User = Department::where("deptName", $request->DeptName)->first();
            if (empty($User)) {
                $insert = new Department();
                $insert->deptName = $request->DeptName;
                $insert->save();
                return response()->json(["title" => "Done !", "msg" => "Department Added Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Department Already Exist", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function getEditDeptData(Request $request)
    {
        try {
            $data = Department::where("id", $request->id)->first();
            return view("Admin.Department.editDept", compact('data'));
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function deleteDepartment(Request $request)
    {
        try {
            $checkDept = User::where("DeptId", $request->id)->get();
            if (count($checkDept) == 0) {
                $delete = Department::where("id", $request->id)->delete();
                if ($delete) {
                    return response()->json(["title" => "Done !", "msg" => "Department Deleted Successfully", "type" => "success"]);
                } else {
                    return response()->json(["title" => "Error !", "msg" => "Department Not Deleted", "type" => "error"]);
                }
            } else {
                return response()->json(["title" => "Error !", "msg" => "Department is associated with user", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function updateDepartment(Request $request)
    {
        try {
            $update = Department::where("id", $request->id)->update([
                "deptName" => $request->DeptName,
                "updated_at" => now()
            ]);
            if ($update) {
                return response()->json(["title" => "Done !", "msg" => "Department Updated Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Department Not Updated", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
}
