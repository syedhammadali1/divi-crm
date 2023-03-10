<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\GetAllClientsRequest;
use App\Http\Requests\Client\GetClientRequest;
use App\Http\Requests\Users\GetUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAttributes;
use App\Http\Requests\RequestProjects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\attenda;
use App\Models\packages;
use App\Models\projects;
use App\Models\project_package;
use App\Models\project_attachment;

use Session;
use Helper;
use DB;
use Hash;

class ClientController extends Controller
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
     * @param GetAllClientsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllClientsRequest $request)
    {
        $response = $request->handle();

        return view('client.index', ['clients' => $response]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function client_task_profile($id)
    {

        // $user = Auth::user();
        // if ($user->role_id != 1) {
        //     return redirect()->back()->with('error', "No Link found");
        // }
        $type = "client";
        $projects = projects::where("is_active" , 1)->where("client_id" , $id)->get();
        $user = User::where("id", $id)->where('type',1)->first();
        if (!isset($user)){
            return redirect()->back()->with('error', 'No Record Found');
        }
        return view('client/client_task_profile')->with(compact('user','type','projects'));
    }

    public function support_task_profile($id)
    {
        // $user = Auth::user();
        // if ($user->role_id != 1) {
        //     return redirect()->back()->with('error', "No Link found");
        // }
        $type = "sales";
        $projects = projects::where("is_active" , 1)->where("user_id" , $id)->get();
        $user = User::where("id", $id)->where("is_active" , 1)->first();
        return view('client/client_task_profile')->with(compact('user','type','projects'));
    }

    public function update_client_profile(Request $request)
    {
      if ($request->client_id != "" && $request->client_id != 0) {
        $user = User::where("is_active" ,1)->where('id' , $request->client_id)->first();
        if ($user) {
          $user->company = $request->company;
          $user->username = $request->username;
          $user->name = $request->name;
          $user->phonenumber = $request->phonenumber;
          $user->residential_address = $request->residential_address;
          $user->city = $request->city;
          $user->postcode = $request->postcode;
          $user->country = $request->country;
          $user->bio = $request->bio;
          $user->save();
          return redirect()->back()->with('message', "Client information has been updated successfully");
        }else{
          return redirect()->back()->with('error', "No Active Record found");
        }
      }else{
        return redirect()->back()->with('error', "No Client Record found");
      }
    }


    public function update_client_password(Request $request)
    {
      if ($request->client_id != "" && $request->client_id != 0) {
        $user = User::where("is_active" ,1)->where('id' , $request->client_id)->first();
        if ($user) {
          $user->password = Hash::make($request->password);
          $user->save();
          return redirect()->back()->with('message', "Client password has been updated successfully");
        }else{
          return redirect()->back()->with('error', "No Active Record found");
        }
      }else{
        return redirect()->back()->with('error', "No Client Record found");
      }
    }

    public function create(GetClientRequest $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('submit-clients');

        return view('client.form', ['user' => $response,'route' => $route, 'edit' => false]);

    }

    public function store(CreateClientRequest $request)
    {
        $response = $request->handle();

        return redirect()->route('all_clients')->with('message', 'Client Add Successfully');
    }


    public function findClientByEmail(Request $request)
    {
        return user::where('email',$request->clientemail)->where('type',1)->first();
    }

}

