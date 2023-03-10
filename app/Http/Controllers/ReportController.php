<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Helper;
use App\Models\User;
use App\Models\attributes;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Session;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registered_user_report()
    {
    	
    	$user = Auth::user();

    	if ($user->role_id != 1 && Auth::user()->role_id != 36) {
    		return redirect()->back()->with('error', 'No Page Found');
    	}
        $project_id = Session::get("project_id");

        $all_user = User::where('is_deleted' , 0)->where('project_id' , $project_id)->get();
    	$designation = attributes::where("is_active" , 1)->get();
        
    	return view('reports/registered-user-report')->with(compact('all_user','user','designation'));
    }

    public function all_registered_user_report($slug = '')
    {
        
        $user = Auth::user();

        if ($user->role_id != 1 && Auth::user()->role_id != 36) {
            return redirect()->back()->with('error', 'No Page Found');
        }
        $project_id = Session::get("project_id");
        $all_user = User::where('is_deleted' , 0)->where('project_id' , $project_id)->get();
        
        $designation = attributes::where("is_active" , 1)->get();
        
        return view('reports/all-registered-user-report')->with(compact('all_user','user','designation','slug'));
    }


    public function attendance_sheet_import()
    {
        $user = Auth::user();
        if ($user->role_id != 1 && Auth::user()->role_id != 36) {
            return redirect()->back()->with('error', 'No Page Found');
        }
        
        return view('reports/attendance-sheet-import')->with(compact('user'));
    }

    public function attendance_import_submit(Request $request)
    {
        if (!$request->has('file')) {
            return redirect()->back()->with('error', 'No file is attached.');
        }
        $extensions = array("xls","xlsx");
        $result = array($request->file('file')->getClientOriginalExtension());

        if(in_array($result[0],$extensions)){
            Excel::import(new AttendanceImport,request()->file('file'));
            return redirect()->back()->with('message', 'Attendance Sheet has been uploaded successfully');
        }else{
           return redirect()->back()->with('error', 'Only xlsx extension is allowed.');
        }
        
        
    }
}
