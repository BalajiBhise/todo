<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Task;
use App\Models\Comment;

class ClientDashboardController extends Controller
{
    function index()
    {
        try {
            return view("Client.Dashboard.dashboard");
        } catch (Exception $e) {
            return view("errors.404");
        }
    }
    function getAssignedTaskData(Request $request)
    {
        try {
            //code...
            $data = task::where("EmpId", auth()->user()->id)->select("task.id", "task.task", "task.created_at", "task.updated_at", DB::raw("(CASE WHEN status=0 THEN 'open' WHEN status=1 THEN 'In Progress' ELSE 'Completed' END) as status"))->orderBy("task.created_at")->get();
            return view("Client.Dashboard.dashTable", compact('data'));
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
    function getEditAssignedTaskData(Request $request)
    {
        try {
            $data = Task::select("id", "task", "Status")->where("id", $request->id)->first();
            return view("Client.Dashboard.editAssignedTask", compact('data'));
        } catch (Exception $e) {
            return response()->json(["title" => "Error !", "msg" => $e->getMessage(), "type" => "error"]);
        }
    }

    function updateAssignedTask(Request $request)
    {
        try {
            $update = Task::where("id", $request->id)->update([
                "status" => $request->Status,
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

    function getNotification()
    {

        try {
            $data = task::where("EmpId", auth()->user()->id)->select("task.task", "task.created_at")->whereDate("task.created_at",date("Y-m-d"))->orderByDesc("task.created_at")->limit(5)->get();
            return view("Layout.Notification",compact('data'));
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
