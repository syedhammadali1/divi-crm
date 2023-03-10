<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\GetDashboardRequest;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\attributes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param GetDashboardRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetDashboardRequest $request)
    {

        $response = $request->handle();
        return view('welcome',['data' => $response]);
    }

    public function steps()
    {
        if(Auth::user()->role_id == 1){
            $projects = attributes::where('attribute' , 'project')->where('is_active' ,1)->get();
            return view('steps')->with(compact('projects'));
        }else{
            return redirect()->back()->with('error', 'No Page Found');
        }
    }
    public function switch_project($project_id)
    {
        if(Auth::user()->role_id == 1){
            $project = attributes::where('id',$project_id)->where('is_active' ,1)->first();
            $data['project_id'] = $project_id;
            Session::put("project_id" , $project_id);
            Helper::activity_log("login",$data);
            return redirect()->route('user_profile')->with('message', "Welcome to ".$project->name);
        }else{
            return redirect()->back()->with('error', 'No Page Found');
        }
    }
    public function user_profile()
    {
        $user = Auth::user();
        return view('user-profile')->with('title',"Home Page")->with(compact('user'));
    }
    public function user_rights()
    {
        $user = Auth::user();
        //dd(Session::get("project_id" ));
        $roles = attributes::where("is_active" ,1)->where('is_deleted' , 0)->get();
        return view('user-rights')->with('title',"User Rights")->with(compact('user','roles'));
    }

    public function user_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->personal_email = $request->personal_email;
        $user->phonenumber = $request->phonenumber;
        $user->emergency_number = $request->emergency_number;
        $user->cnic = $request->cnic;
        $user->residential_address = $request->residential_address;
        $user->blood_group = $request->blood_group;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;

        if (isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('message', 'Information updated successfully');
    }

    public function user_updates(Request $request)
    {
        $user = User::find($_POST['user_id']);
        if (!is_null($request->emp_id) && $request->emp_id != "") {
            $user->emp_id = $request->emp_id;
        }
        if (!is_null($request->role_id) && $request->role_id !="") {
            $user->role_id = $request->role_id;
        }
        if (!is_null($request->department_id) && $request->department_id != "") {
            $user->department = $request->department_id;
        }
        if (!is_null($request->designations) && $request->designations != "") {
            $user->designation = $request->designations;
        }
        if (!is_null($request->reporting_line_id) && $request->reporting_line_id != "") {
            $user->reporting_line = $request->reporting_line_id;
        }
        if (!is_null($request->salary) && $request->salary != "") {
            $user->salary = $request->salary;
        }
        if (!is_null($request->status) && $request->status != "") {
            $user->is_active = $request->status;
        }
        if (!is_null($request->shift_in) && $request->shift_in != "") {
            $user->shift_in = $request->shift_in;
        }
        if (!is_null($request->shift_out) && $request->shift_out != "") {
            $user->shift_out = $request->shift_out;
        }

        $user->save();
        return redirect()->back()->with('message', 'Information updated successfully');
    }

    public function shift_change()
    {

    }


// office details start
    public function user_office_details()
    {
        $user = Auth::user();
        return view('user-office-details')->with('title',"Office Details")->with(compact('user'));
    }
    public function user_office_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // $user->emp_id = $request->emp_id;
        // $user->email = $request->email;
        // $user->designation = $request->designation;
        // $user->department = $request->department;
        // $user->join_date = $request->join_date;
        // $user->reporting_line = $request->reporting_line;
        $user->bank_account_number = $request->bank_account_number;
        $user->v_model_name = $request->v_model_name;
        $user->v_model_year = $request->v_model_year;
        $user->v_number_plate = $request->v_number_plate;

        $user->save();
        // Session::flash('message', 'This is a message!');
         Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('message', 'Information updated successfully');
    }
// office details end

// file details start
    public function user_file_details()
    {
        $user = Auth::user();
        return view('user-file-details')->with('title',"file Details")->with(compact('user'));
    }
    public function user_file_infoupdate(Request $request)
    {
        // $user = User::find(Auth::user()->id);

        // $user->emp_id = $request->emp_id;
        // $user->email = $request->email;
        // $user->designation = $request->designation;
        // $user->department = $request->department;
        // $user->join_date = $request->join_date;
        // $user->reporting_line = $request->reporting_line;
        // $user->bank_account_number = $request->bank_account_number;
        // $user->v_model_name = $request->v_model_name;
        // $user->v_model_year = $request->v_model_year;
        // $user->v_number_plate = $request->v_number_plate;

        // $user->save();
        // Session::flash('message', 'This is a message!');
        // Session::flash('alert-class', 'alert-danger');
        // return redirect()->back()->with('success', 'Information updated successfully');
    }
// file details end

    public function upload_image(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $path = "";
        if ($request->file('pic_attach') != '') {
            $path = ($request->file('pic_attach'))->store('uploads/avatar/'.md5(Str::random(20)), 'public');
        }
        $user->profile_pic = $path;
        $user->save();
        return redirect()->back()->with('success', 'Image has been successfully updated');
    }
    public function profile_submit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // Avatar Upload
        if ($request->has('avatar')) {
            if ($request->file('avatar') != '') {
                 $request->validate([
                 'avatar' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
                ]);
                $path_a = ($request->file('avatar'))->store('uploads/avatar/'.md5(Str::random(20)), 'public');
                $user->profile_pic = $path_a;
                $user->save();
                return redirect()->back()->with('message', 'Profile Picture been updated successfully');
            }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Profile Picture');
            }
        }
        // Resume Upload
        if ($request->has('cnic_file')) {
            if ($request->file('cnic_file') != '') {
            $request->validate([
             'cnic_file' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
            ]);
            $path_c = ($request->file('cnic_file'))->store('uploads/cnic/'.md5(Str::random(20)), 'public');
            $user->cnic_doc = $path_c;
            $user->save();
            return redirect()->back()->with('message', 'NIC Picture has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your NIC Picture');
            }
        }
        // // CNIC Upload
        if ($request->has('cv_file')) {
            if ($request->file('cv_file') != '') {
            $request->validate([
             'cv_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_r = ($request->file('cv_file'))->store('uploads/resume/'.md5(Str::random(20)), 'public');
            $user->resume_doc = $path_r;
            $user->save();
            return redirect()->back()->with('message', 'Resume/CV Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Resume/CV Document');
            }
        }
       // // Education Upload
        if ($request->has('education_file')) {
            if ($request->file('education_file') != '') {
            $request->validate([
             'education_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_e = ($request->file('education_file'))->store('uploads/education/'.md5(Str::random(20)), 'public');
            $user->education_doc = $path_e;
            $user->save();
            return redirect()->back()->with('message', 'Education Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Education Document');
            }
        }
    }

}
