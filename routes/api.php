<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CorporateController;
use App\Http\Controllers\API\ActivationController;
use App\Http\Controllers\API\RDPController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\RDPBlockController;
use App\Http\Controllers\API\SystemController;
use App\Http\Controllers\API\SearchFilterController;
use App\Http\Controllers\NPAV\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any("/activation/token/corpid",[CorporateController::class,"GetCorpIdFromToken"]);
Route::any("/EmailAPI",[CorporateController::class,"EmailAPI"]);
Route::any("/activation/exe/password/validate",[CorporateController::class,"ValidateExeUninstallPassword"]);

Route::any("/activation/check",[ActivationController::class,"CheckActivation"]);
Route::any("/activate/product",[ActivationController::class,"ActivateProduct"]);
Route::any("/activate/uninstallProduct",[ActivationController::class,"uninstallProduct"]);
Route::any("/activate/getActivateLicKey",[ActivationController::class,"getActivateLicKey"]);



Route::any("/rdp/log/single/save",[RDPController::class,"SaveSingleRdpLog"]);
Route::any("/rdp/log/multi/save",[RDPController::class,"SaveMultiRdpLog"]);

Route::any("/rdpsmgsui/status/GetSettings",[SettingController::class,"GetSettings"]);
Route::any("/rdpsmgsui/status/update",[SettingController::class,"UpdateSettingStatus"]);

Route::any("/v1/rdp",[RDPBlockController::class,"GetRdpBlock"]);
Route::any("/system/info/save",[SystemController::class,"SaveSystemInfo"]);
Route::any("/system/disk/info/save",[SystemController::class,"SaveDiskInfo"]);
Route::any("/system/disk/both/save",[SystemController::class,"SaveSystemDiskInfo"]);

Route::any("/SearchFilter/v1/log",[SearchFilterController::class,"SearchFilterSaveLog"]);
Route::any("/SearchFilter/v1/IdleTime",[SearchFilterController::class,"SaveIdleTimeLogs"]);

Route::any("/pc/activity/tracker/log/save",[SearchFilterController::class,"SavePcActivityTrackerLog"]);
Route::any("/pc/activity/tracker/log/LockUnlock",[SearchFilterController::class,"LockUnlock"]);
Route::any("/SearchFilter/SaveScreenshot",[SearchFilterController::class,"SaveScreenshot"]);
Route::any("/SearchFilter/getAllowList",[SearchFilterController::class,"getAllowList"]);
Route::any("/Requestlog",[SearchFilterController::class,"Requestlog"]);

Route::any("/capture/SaveUserPhoto",[SearchFilterController::class,"SaveUserPhoto"]);




Route::any("/createUser",[DashboardController::class,"CreateUserAPI"]);
Route::post("/demoUser",[DashboardController::class,"demouser"]);
Route::post("/deleteCorp",[DashboardController::class,"deleteCorp"]);
Route::post("/contactUs",[DashboardController::class,"contactUs"]);
Route::post("/emailapi",[DashboardController::class,"emailapi"]);
Route::any("/dayewise",[DashboardController::class,"calculateTodayShiftHours"]);



