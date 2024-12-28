<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hr\loginController;
use App\Http\Controllers\Hr\DashboardController;
use App\Http\Controllers\Hr\ManageEmployeeController;
use App\Http\Middleware\CheckHrStatus;


Route::name('hr.')->group(function(){
    Route::get('hr/register',[loginController::class,'register'])->name('register');
    Route::post('hr/do-registration',[loginController::class,'registration'])->name('registration');
    Route::get('hr/login',[loginController::class,'login'])->name('login');
    Route::post('hr/do-login',[loginController::class,'dologin'])->name('dologin');
    Route::get('hr/addprofile',[loginController::class,'addprofile'])->name('addprofile')->middleware('auth:Hr');
    Route::post('hr/updateprofile',[loginController::class,'updateprofile'])->name('updateprofile');
    Route::middleware([CheckHrStatus::class])->group(function () {
        Route::get('hr/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth:Hr');
        Route::get('hr/approve-employee',[ManageEmployeeController::class,'approveEmployee'])->name('approveEmployee')->middleware('auth:Hr');
        Route::get('hr/employee-details/{id}',[ManageEmployeeController::class,'Employeedetails'])->name('Employeedetails')->middleware('auth:Hr');

    });

    
});
