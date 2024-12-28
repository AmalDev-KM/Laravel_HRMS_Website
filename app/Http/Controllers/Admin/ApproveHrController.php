<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr;

class ApproveHrController extends Controller
{
    public function approveHr(){
        $Hrs = Hr::where('status',2)->get();
        $activeHrs = Hr::where('status',1)->get();
        return view('admin.HrApproval',compact('Hrs','activeHrs'));
    }

    public function doapproveHr($id)
    {
        $hr = Hr::find(decrypt($id));
        $hr['status'] = 1;
        $hr->save();
        return redirect()->route('admin.approveHr')->with('message', 'Aproved HR successfully!');
    }
}
