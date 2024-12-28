<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Jobrole;
use App\Http\Requests\CreateJobroleRequest;
use App\Http\Requests\EditJobroleRequest;

class JobroleController extends Controller
{
    public function jobrole(){
        $currentjobrole = null;
        $departments = Department::where('status', 1)->get();
        $jobroles = DB::table('Jobroles')
            ->join('departments','Jobroles.department_id','=','departments.id')
            ->select('departments.name as department_name','jobroles.*')->where('jobroles.status', 1)->get();
        return view('admin.jobroles',compact('departments','jobroles','currentjobrole'));
    }

    public function createjobrole(CreateJobroleRequest $request){
        $input = $request->validated();
        Jobrole::create($input);
        return redirect()->route('admin.jobrole')->with('message',"Jobrole created Successfully");
    }

    public function editjobrole($id){
        $departments = Department::where('status', 1)->get();
        $currentjobrole = jobrole::find(decrypt($id));
        $jobroles = DB::table('Jobroles')
            ->join('departments','Jobroles.department_id','=','departments.id')
            ->select('departments.name as department_name','jobroles.*')->where('jobroles.status', 1)->get();
        return view('admin.jobroles',compact('departments','jobroles','currentjobrole'));
    }

    public function updatejobrole(EditJobroleRequest $request){
        $input = $request->validated();
        $jobrole = jobrole::find($request->jobrole_id);
        $jobrole->update($input);
        return redirect(route('admin.jobrole'))->with('messages',"Jobrole updated successfully");
    }

    public function deletejobrole($id){
        $jobrole = jobrole::find(decrypt($id));
        $jobrole->status = 0;
        $jobrole->save();
        return redirect(route('admin.jobrole'))->with('message',"Jobrole deleted Successfully");
    }
}
