<?php

namespace App\Http\Controllers\Admin;

use App\Events\TaskRegister;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    function index()
    {
        try {
            $Employee = User::select('id', 'name')->orderBy("name")->get();
            return view("Admin.Task.task", compact('Employee'));
        } catch (Exception $e) {
            return view("errors.404");
        }
    }
    function getTaskData(Request $request)
    {
        try {
            //code...
            $data = task::leftjoin("users", "users.id", "task.EmpId")->select("task.id", "task.task", "name", "task.created_at", DB::raw("(CASE WHEN status=0 THEN 'open' WHEN status=1 THEN 'In Progress' ELSE 'Completed' END) as status"))->orderBy("task.created_at")->get();
            return view("Admin.Task.taskTable", compact('data'));
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
    function saveTask(Request $request)
    {
        try {
            $insert = new Task();
            $insert->task = $request->task;
            $insert->EmpId = $request->EmpId;
            $insert->status = 0;
            $insert->save();
            $task = $request->task ;
            $id = $request->EmpId ;
            event(new TaskRegister($task,$id));
            return response()->json(["title" => "Done !", "msg" => "Task Added Successfully", "type" => "success"]);
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function getEditTaskData(Request $request)
    {
        try {
            $data = Task::select("id", "task", "EmpId")->where("id", $request->id)->first();
            $Employee = User::select('id', 'name')->orderBy("name")->get();
            return view("Admin.Task.editTask", compact('data', 'Employee'));
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function deleteTask(Request $request)
    {
        try {
            $delete = Task::where("id", $request->id)->delete();
            if ($delete) {
                return response()->json(["title" => "Done !", "msg" => "Task Deleted Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Task Not Deleted", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
    function updateTask(Request $request)
    {
        try {
            $update = Task::where("id", $request->id)->update([
                "task" => $request->task,
                "EmpId" => $request->EmpId,
                "updated_at" => now()
            ]);
            if ($update) {
                return response()->json(["title" => "Done !", "msg" => "Task Updated Successfully", "type" => "success"]);
            } else {
                return response()->json(["title" => "Error !", "msg" => "Task Not Updated", "type" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }
}
