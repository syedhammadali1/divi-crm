<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssigneeBrandTarget\CreateAssigneeBrandTargetRequest;
use App\Http\Requests\AssigneeBrandTarget\GetAllAssigneeBrandTargetsRequest;
use App\Http\Requests\AssigneeBrandTarget\GetAssigneeBrandTargetRequest;
use App\Http\Requests\AssigneeBrandTarget\UpdateAssigneeBrandTargetRequest;
use App\Http\Requests\BrandTarget\GetAllBrandTargetsRequest;
use App\Models\AssigneeBrandTarget;
use App\Models\brand;
use App\Models\brand_target;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssigneeBrandTargetController extends Controller
{
    /**
     * @param GetAllAssigneeBrandTargetsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllAssigneeBrandTargetsRequest $request)
    {
        $response = $request->handle();
        return view('assigneebrandtargets.index', ['assigneebrandtargets' => $response]);
    }

    /**
     * @param CreateAssigneeBrandTargetRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $getbrand = brand::find($request->brand_id);

        $getbrandtarget = brand_target::find($request->brand_target_id);

        $salesManagerResponse = AssigneeBrandTarget::where('brand_target_id' , $request->brand_target_id)->where('assignee_type', 0)->first();
        $supportManagerResponse = AssigneeBrandTarget::where('brand_target_id' , $request->brand_target_id)->where('assignee_type', 0)->first();
        $ownResponse = AssigneeBrandTarget::where('brand_target_id' , $request->brand_target_id)->where('assignee_type', 0)->first();

        $assigneerequest = new GetAssigneeBrandTargetRequest();

        $assigneerequest->id = 0;

        $response = $assigneerequest->handle();

        $route = route('assignee-brand-target.store', ['brand_id' => $request->brand_id,'brand_target_id' => $request->brand_target_id ] );

        $assignedUserInfoResponse = AssigneeBrandTarget::where('brand_target_id' , $request->brand_target_id)->pluck('assigner_emp_id')->toArray();
        if ($userRole == "brand manager"){
            $salesSupportUsers = user::where('type',2)->where('reporting_line',$user->email)->where('id','!=',1)->whereNotIn('emp_id',$assignedUserInfoResponse)->get();
        }else{
            $salesSupportUsers = user::where('type',2)->where('id','!=',1)->whereNotIn('emp_id',$assignedUserInfoResponse)->get();
        }

        return view('assigneebrandtargets.form',
            ['assignedbrandtarget' => $response,
                'salesManagerResponse' => $salesManagerResponse,
                'supportManagerResponse' => $supportManagerResponse,
                'ownResponse' => $ownResponse,
                'getbrand' => $getbrand,
                'getbrandtarget' => $getbrandtarget,
                'salesSupportUsers' => $salesSupportUsers,
                'route' => $route,
                'edit' => false]);
    }

    /**
     * @param CreateAssigneeBrandTargetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAssigneeBrandTargetRequest $request)
    {
        $response = $request->handle();
        if ($response){
            return redirect()->back()->with('message', 'Create Assignee Brand Target Successfully');
        }else{
            return redirect()->back()->with('error', 'Invalid Data');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
//        $request = new GetAssigneeBrandTargetRequest();
//
//        $request->id = $id;
//
//        $response = $request->showHandle();
//
//        return view('assigneebrandtargets.index', ['assigneebrandtargets' => $response]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $req,$id)
    {

        $getbrandtarget = brand_target::find($req->brand_target_id);

        $getbrand = brand::find($req->brand_id);

        $salesManagerResponse = AssigneeBrandTarget::where('brand_target_id' , $req->brand_target_id)->where('assignee_type', 1)->first();
        $supportManagerResponse = AssigneeBrandTarget::where('brand_target_id' , $req->brand_target_id)->where('assignee_type', 2)->first();
        $ownResponse = AssigneeBrandTarget::where('brand_target_id' , $req->brand_target_id)->where('assignee_type', 3)->first();

        $request = new GetAssigneeBrandTargetRequest();

        $request->id = $id;

        $response = $request->handle();

        $route = route('assignee-brand-target.update', ['assignee_brand_target' => $response->id]);

        $assignedUserInfoResponse = AssigneeBrandTarget::where('brand_target_id' , $req->brand_target_id)->where('assigner_emp_id' ,'!=' , $response->assigner_emp_id)->pluck('assigner_emp_id')->toArray();

        $salesSupportUsers = user::where('type',2)->where('id','!=',1)->whereNotIn('emp_id',$assignedUserInfoResponse)->get();

        return view('assigneebrandtargets.form',
            ['assignedbrandtarget' => $response,
                'salesManagerResponse' => $salesManagerResponse,
                'supportManagerResponse' => $supportManagerResponse,
                'ownResponse' => $ownResponse,
                'getbrand' => $getbrand,
                'getbrandtarget' => $getbrandtarget,
                'salesSupportUsers' => $salesSupportUsers,
                'route' => $route,
                'edit' => true]);
    }

    /**
     * @param UpdateAssigneeBrandTargetRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAssigneeBrandTargetRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->back()->with('message', 'Edit Assignee Brand Target Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = AssigneeBrandTarget::find($id);

        $item->delete();

        return redirect()->back()->with('message', 'Delete Assignee Brand Target Successfully');
    }

    public function showabt($id , $brand_id)
    {
        $request = new GetAssigneeBrandTargetRequest();

        $request->id = $id;

        $response = $request->showHandle();

        $targetByID = brand_target::find($id);

        $todayMY = date('y-m-d');

        $brandTargetMY = date('y-m-d', strtotime($targetByID->target_month));

        $brandTargetValidity = $todayMY < $brandTargetMY ;

        return view('assigneebrandtargets.index',
            ['assigneebrandtargets' => $response ,
                'brandid' => $brand_id ,
                'brand_target_id' => $id ,
                'brandTargetValidity' => $brandTargetValidity,
                'brandTargetInfo' => $targetByID ]);
    }
}
