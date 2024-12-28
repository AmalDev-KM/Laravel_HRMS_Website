<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\AuthenticationController;
use App\Http\Controllers\Employee\ProfileController;
use App\Http\Middleware\CheckEmployeeStatus;

Route::name('employee.')->group(function(){
    Route::get('employee/register',[AuthenticationController::class,'register'])->name('register');
    Route::post('employee/do-register',[AuthenticationController::class,'doregister'])->name('do-register');
    Route::get('employee/login',[AuthenticationController::class,'login'])->name('login');
    Route::post('employee/do-login',[AuthenticationController::class,'dologin'])->name('do-login');
    Route::get('employee/Update-profile',[ProfileController::class,'UpdateProfile'])->name('UpdateProfile')->middleware('auth:Employee');
    Route::post('employee/do-Update-profile',[ProfileController::class,'doUpdateProfile'])->name('doUpdateProfile')->middleware('auth:Employee');
    Route::middleware([CheckEmployeeStatus::class])->group(function () {
        Route::get('employee/dashboard',[AuthenticationController::class,'dashboard'])->name('dashboard')->middleware('auth:Employee');
    });
});