<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEmpProfileRequest;
use App\Models\Employee;
use App\Models\Hr;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function UpdateProfile(){
        $hrs = Hr::where('status',1)->get();
        return view('employee.addprofile',compact('hrs'));
    }

    public function doUpdateProfile(UpdateEmpProfileRequest $request){
        $input = $request->validated();
        if($request->hasFile('profile_picture')){
            $extension = $request->profile_picture->extension();
            $filename = Str::random(6).'_'.time()."_Employee.".$extension;
            $request->profile_picture->storeAs('images',$filename,'public');
            $input['profile_picture'] = $filename;
        }
        $employee = Employee::find($request->employee_id);
        $employee->update($input);
        return redirect(route('employee.UpdateProfile'))->with('message',"profile updated successfully..");
    }
}
