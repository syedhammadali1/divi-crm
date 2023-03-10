<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\User;
use App\Models\role_assign;
use App\Models\attributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use Session;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/')->with('error', 'Kindly Logout to submit Employee Registration Form');
        }
        // return view('employee_registration');

//        $departments = attributes::where('attribute' , 'departments')->where('is_active' ,1)->get();
//        $designations = attributes::where('attribute' , 'designations')->where('is_active' ,1)->get();
        $projects = projects::where('is_active', 1)->get();

        // $departments = DB::table('departments')->select('name')->get();
        // $designations = DB::table('designations')->select('name')->get();
        return view('employee_registration')->with('title', "Employee Registration")->with(compact('projects'));
    }

    public function registration_submit(RequestUser $request)
    {

        $user = new User;
        $user->project_id = $request->project_id;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->personal_email = $request->personal_email;
        $user->phonenumber = $request->phonenumber;
        $user->emergency_number = $request->emergency_number;
        $user->cnic = $request->cnic;
        $user->residential_address = $request->residential_address;
        $user->blood_group = $request->blood_group;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;
        $user->emp_id = $request->emp_id;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->department = $request->department;
        $user->join_date = $request->join_date;
        $user->reporting_line = $request->reporting_line;
        if (isset($request->company_vehicle)) {
            $user->v_model_name = $request->v_model_name;
            $user->v_model_year = $request->v_model_year;
            $user->v_number_plate = $request->v_number_plate;
        } else {
            $user->v_model_name = "";
            $user->v_model_year = "";
            $user->v_number_plate = "";
        }

        $user->bank_account_number = $request->bank_account_number;
        $user->password = Hash::make("admin321");

        // Avatar Upload
        if ($request->file('avatar') != '') {
            $path_a = ($request->file('avatar'))->store('uploads/avatar/' . md5(Str::random(20)), 'public');
            $user->profile_pic = $path_a;
        }

        // Resume Upload
        if ($request->file('cv_file') != '') {
            $path_r = ($request->file('cv_file'))->store('uploads/resume/' . md5(Str::random(20)), 'public');
            $user->resume_doc = $path_r;
        }

        // CNIC Upload
        if ($request->file('cnic_file') != '') {
            $path_c = ($request->file('cnic_file'))->store('uploads/cnic/' . md5(Str::random(20)), 'public');
            $user->cnic_doc = $path_c;
        }

        // Education Upload
        if ($request->file('education_file') != '') {
            $path_e = ($request->file('education_file'))->store('uploads/education/' . md5(Str::random(20)), 'public');
            $user->education_doc = $path_e;
        }

        $user->save();

        return redirect()->back()->with('message', 'User has been successfully added');
    }
}
