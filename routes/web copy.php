<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientLoginController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\UserAccess;  
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TaskController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// NPAV
Route::get("/admin", [LoginController::class, "index"])->name('admin.login');
Route::post("/admin/handlelogin", [LoginController::class, "handlelogin"]);
 
Route::middleware([AdminAccess::class])->group(function () {
    Route::get("/admin/logout", [LoginController::class, "logout"]); 
    Route::get("/admin/employee", [EmployeeController::class, "index"]);
    Route::get("/admin/getEmployeeData", [EmployeeController::class, "getEmployeeData"]);
    Route::get("/admin/getEditUserData", [EmployeeController::class, "getEditUserData"]);
    Route::post("/admin/saveEmployee", [EmployeeController::class, "saveEmployee"]);
    Route::post("/admin/updateEmployee", [EmployeeController::class, "updateEmployee"]);
    Route::post("/admin/deleteEmployee", [EmployeeController::class, "deleteEmployee"]);

    Route::get("/admin/department", [DepartmentController::class, "index"]);
    Route::get("/admin/getDepartmentData", [DepartmentController::class, "getDepartmentData"]);
    Route::get("/admin/getEditDeptData", [DepartmentController::class, "getEditDeptData"]);
    Route::post("/admin/saveDepartment", [DepartmentController::class, "saveDepartment"]);
    Route::post("/admin/updateDepartment", [DepartmentController::class, "updateDepartment"]);
    Route::post("/admin/deleteDepartment", [DepartmentController::class, "deleteDepartment"]);

    Route::get("/admin/task", [TaskController::class, "index"]);
    Route::get("/admin/getTaskData", [TaskController::class, "getTaskData"]);
    Route::get("/admin/getEditTaskData", [TaskController::class, "getEditTaskData"]);
    Route::post("/admin/saveTask", [TaskController::class, "saveTask"]);
    Route::post("/admin/updateTask", [TaskController::class, "updateTask"]);
    Route::post("/admin/deleteTask", [TaskController::class, "deleteTask"]);

    

});




// Client  -----------------------------------------------------------------------------------------------------------------------------------

Route::get("/", [ClientLoginController::class, 'index'])->name("client.login");
Route::get("/login", [ClientLoginController::class, 'index']);
Route::get("/logout", [ClientLoginController::class, 'logout']);
Route::any("/handlelogin", [ClientLoginController::class, "handlelogin"]);
Route::middleware([UserAccess::class])->group(function () {

     
    Route::get("/dashboard", [ClientDashboardController::class, 'index']);
    Route::get("/getAssignedTaskData", [ClientDashboardController::class, 'getAssignedTaskData']);
    Route::get("/getEditAssignedTaskData", [ClientDashboardController::class, 'getEditAssignedTaskData']);
    Route::post("/updateAssignedTask", [ClientDashboardController::class, 'updateAssignedTask']);

    Route::post("/updatePassword", [ClientLoginController::class, 'updatePassword']);

});
 
 
 



 



Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

