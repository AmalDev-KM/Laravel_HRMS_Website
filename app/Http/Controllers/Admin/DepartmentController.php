<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\EditDepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function department(){
        $department = null;
        $departments = department::where('status', 1)->get();
        return view('admin.department',compact('departments','department'));
    }

    public function createdepartment(CreateDepartmentRequest $request){
        $input = $request->validated();
        Department::create($input);
        return redirect()->route('admin.department')->with('message', 'Department created successfully!');
    }

    public function editdepartment($id){
        $departments = department::where('status', 1)->get();
        $department = Department::find(decrypt($id));
        return view('admin.department',compact('department','departments'));
    }

    public function updatedepartment(EditDepartmentRequest $request){
        $input = $request->validated();
        $department = Department::find($request->department_id);
        $department->update($input);
        return redirect()->route('admin.department')->with('message', 'Department updated successfully!');
    }

    public function deletedepartment($id){
        $department = Department::find(decrypt($id));
        $department->status = 0;
        $department->save();
        return redirect()->route('admin.department')->with('message', 'Department deleted successfully!');
    }
}
