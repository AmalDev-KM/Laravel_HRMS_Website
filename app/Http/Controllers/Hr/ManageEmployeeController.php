<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Jobrole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ManageEmployeeController extends Controller
{
    public function approveEmployee(){
        $Employees = Employee::where('status',0)->where('reviewinghr',Auth::guard('Hr')->id())->get();
        $activeEmployees = Employee::where('status',1)->get();
        return view('hr.EmployeeApproval',compact('Employees','activeEmployees'));
    }

    public function Employeedetails($id){
        $employee = Employee::find(decrypt($id));
        $departments = Department::where('status',1)->get();
        $jobroles = Jobrole::where('status',1)->get();
        return view('hr.singleEmployee',compact('employee','departments','jobroles'));
    }
}
