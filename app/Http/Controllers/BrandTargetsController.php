<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\GetAllBrandsRequest;
use App\Http\Requests\BrandTarget\CreateBrandTargetRequest;
use App\Http\Requests\BrandTarget\GetAllBrandTargetsRequest;
use App\Http\Requests\BrandTarget\GetBrandTargetRequest;
use App\Http\Requests\BrandTarget\UpdateBrandTargetRequest;
use App\Models\brand_target;
use App\Models\brandEmployee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandTargetsController extends Controller
{
    /**
     * @param GetAllBrandTargetsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllBrandTargetsRequest $request)
    {
        $response = $request->handle();
        return view('brandtargets.index', ['brandtargets' => $response]);
    }

    /**
     * @param GetBrandTargetRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetBrandTargetRequest $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('brand-target');

        $getAllBrandsRequest = new GetAllBrandsRequest();

        $allBrands = $getAllBrandsRequest->handle();

        $brandManagers = user::where('type',2)->where('id','!=',1)->get();

        return view('brandtargets.form', ['brandtarget' => $response, 'allBrands' => $allBrands,'brandManagers' => $brandManagers,'route' => $route, 'edit' => false]);
    }

    /**
     * @param CreateBrandTargetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBrandTargetRequest $request)
    {
        $response = $request->handle();

        if ($response == false){
            return redirect()->route('brand-target.index')->with('error', 'Brand Target Already Set At This Month !');
        }
        return redirect()->route('brand-target.index')->with('message', 'Brand Target Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $request = new GetBrandTargetRequest();

        $request->id = $id;

        $response = $request->handle();

        if (!isset($response->id)){
            return redirect()->route('brand-target.index')->with('error', 'Brand Target Not Found !');
        }

        $route = route('brand-target.update', ['brand_target' => $response->id]);

        $getAllBrandsRequest = new GetAllBrandsRequest();

        $allBrands = $getAllBrandsRequest->handle();

        $brandManagers = user::where('type',2)->where('id','!=',1)->get();

        return view('brandtargets.form', ['brandtarget' => $response, 'allBrands' => $allBrands,'brandManagers' => $brandManagers,'route' => $route, 'edit' => true]);
    }

    /**
     * @param UpdateBrandTargetRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBrandTargetRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->route('brand-target.index')->with('message', 'Brand Target Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getBrandManagersBrands(Request $request)
    {

        $userCheck = user::where("emp_id" ,$request->emp_id)->where('type', 2)->first();

        if (isset($userCheck)) {
            $brandNames = brandEmployee::with('brandName')->where("employee_id" ,$request->emp_id)->get();
            $body = [];
            foreach ($brandNames as $key => $value) {
                $body[$key] = "<li>".'*'." ".$value->brandName->name."</li> <br>";
            }
            $bod['status'] = 1;
            $bod['body'] = $body;
        }else{
            $bod['status'] = 0;
            $bod['body'] = ["<li>".'No Brand'." </li> <br>"];
        }

        return json_encode($bod);
    }

    /**
     * @param $brandid
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getBrandTargetsByBrandId($brandid){

        $user = Auth::user();
        $userRole = $user->getRoles()->first();

        $brand_targets = brand_target::with('brandName','brandTargetCreateBY','brandTargetManager')->where('brand_id',$brandid);

        if ($userRole == "brand manager"){
            $brand_targets = $brand_targets->where('brand_manager_id',$user->emp_id);
        }

        $brand_targets = $brand_targets->get();

        return view('brandtargets.index', ['brandtargets' => $brand_targets]);
    }


}
