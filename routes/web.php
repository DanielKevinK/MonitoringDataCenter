<?php

use App\Http\Controllers\Web\ShiftStaffController;
use App\Http\Controllers\Web\ShiftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DataStaffController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ReportMaintenanceController;
use App\Http\Controllers\Web\ReportMonitoringController;
use App\Http\Controllers\Web\SupervisorController;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware'=>['auth']],function(){
    Route::get('/dash', function () {
        return view('admin/dashboard/index');
    });
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function(){
    return view('admin/login/login');
});



// DataStaffController
Route::prefix('dataStaff')->group(
    function (){
        Route::resource('data', DataStaffController::class);
    }
);
Route::post('data', [DataStaffController::class, 'store']);
Route::get('data/{id}', [DataStaffController::class, 'edit']);
Route::get('data/delete/{id}', [DataStaffController::class, 'show']);
Route::delete('data/{id}', [DataStaffController::class, 'destroy']);

// ProductController
Route::prefix('product')->group(
    function (){
        Route::resource('info', ProductController::class);
    }
);
Route::post('info', [ProductController::class, 'store']);
Route::get('info/{id}', [ProductController::class, 'edit']);
Route::get('info/delete/{id}', [ProductController::class, 'show']);
Route::delete('info/{id}', [ProductController::class, 'destroy']);

// ShiftController
Route::prefix('shift')->group(
    function (){
        Route::resource('shiftInfo', ShiftController::class);
    }
);
Route::post('shiftInfo', [ShiftController::class, 'store']);
Route::get('shiftInfo/{id}', [ShiftController::class, 'edit']);
Route::get('shiftInfo/delete/{id}', [ShiftController::class, 'show']);
Route::delete('shiftInfo/{id}', [ShiftController::class, 'destroy']);


// ShiftStaffController
Route::prefix('shiftStaff')->group(
    function (){
        Route::resource('status', ShiftStaffController::class);
    }
);

Route::post('status', [ShiftStaffController::class, 'store']);
Route::get('status/{id}', [ShiftStaffController::class, 'edit']);
Route::get('status/delete/{id}', [ShiftStaffController::class, 'show']);
Route::delete('status/{id}', [ShiftStaffController::class, 'destroy']);


// MonitoringController
Route::prefix('reportMonitoring')->group(
    function (){
        Route::resource('monitoring', ReportMonitoringController::class);
    }
);

Route::post('monitoring', [ReportMonitoringController::class, 'store']);
Route::get('monitoring/{id}', [ReportMonitoringController::class, 'edit']);
Route::get('monitoring/delete/{id}', [ReportMonitoringController::class, 'show']);
Route::delete('monitoring/{id}', [ReportMonitoringController::class, 'destroy']);

// MaintenanceController
Route::prefix('reportMaintenance')->group(
    function (){
        Route::resource('maintenance', ReportMaintenanceController::class);
    }
);

Route::post('maintenance', [ReportMaintenanceController::class, 'store']);
Route::get('maintenance/{id}', [ReportMaintenanceController::class, 'edit']);
Route::get('maintenance/delete/{id}', [ReportMaintenanceController::class, 'show']);
Route::delete('maintenance/{id}', [ReportMaintenanceController::class, 'destroy']);

// superVisorController
Route::prefix('supervisorData')->group(
    function (){
        Route::resource('supervisor', SupervisorController::class);
    }
);

Route::post('supervisor', [SupervisorController::class, 'store']);
Route::get('supervisor/{id}', [SupervisorController::class, 'edit']);
Route::get('supervisor/delete/{id}', [SupervisorController::class, 'show']);
Route::delete('supervisor/{id}', [SupervisorController::class, 'destroy']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


