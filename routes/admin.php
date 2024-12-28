<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\JobroleController;
use App\Http\Controllers\Admin\ApproveHrController;


Route::name('admin.')->group(function(){
    Route::get('admin/login',[LoginController::class,'login'])->name('login');
    Route::post('admin/do-login',[LoginController::class,'dologin'])->name('dologin');
    Route::get('admin/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth:admin');
    Route::get('admin/department',[DepartmentController::class,'department'])->name('department')->middleware('auth:admin');
    Route::post('admin/create-department',[DepartmentController::class,'createdepartment'])->name('createdepartment')->middleware('auth:admin');
    Route::get('admin/edit-department/{id}',[DepartmentController::class,'editdepartment'])->name('editdepartment')->middleware('auth:admin');
    Route::post('admin/update-department',[DepartmentController::class,'updatedepartment'])->name('updatedepartment')->middleware('auth:admin');
    Route::get('admin/delete-department/{id}',[DepartmentController::class,'deletedepartment'])->name('deletedepartment')->middleware('auth:admin');
    Route::get('admin/jobroles',[JobroleController::class,'jobrole'])->name('jobrole')->middleware('auth:admin');
    Route::post('admin/create-jobrole',[JobroleController::class,'createjobrole'])->name('createjobrole')->middleware('auth:admin');
    Route::get('admin/edit-jobrole/{id}',[JobroleController::class,'editjobrole'])->name('editjobrole')->middleware('auth:admin');
    Route::post('admin/update-jobrole',[JobroleController::class,'updatejobrole'])->name('updatejobrole')->middleware('auth:admin');
    Route::get('admin/delete-jobrole/{id}',[JobroleController::class,'deletejobrole'])->name('deletejobrole')->middleware('auth:admin');
    Route::get('admin/approveHr',[ApproveHrController::class,'approveHr'])->name('approveHr')->middleware('auth:admin');
    Route::get('admin/do-approveHr/{id}',[ApproveHrController::class,'doapproveHr'])->name('doapproveHr')->middleware('auth:admin');

});


