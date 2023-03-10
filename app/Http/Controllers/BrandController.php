<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\AssigneeBrandToEmployeeRequest;
use App\Http\Requests\Brand\AssigneeBrandToSourceAccountRequest;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\GetAllBrandsRequest;
use App\Http\Requests\Brand\GetBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Http\Requests\Users\GetAllUsersRequest;
use App\Models\brand;
use App\Models\brandEmployee;
use App\Models\BrandSourceAccount;
use App\Models\SourceAccount;
use App\Models\User;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @param GetAllBrandsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllBrandsRequest $request)
    {
        $response = $request->handleForlisting();
        return view('brand.index', ['brands' => $response]);
    }

    /**
     * @param GetBrandRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetBrandRequest $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('brand');

        $brandManagers = user::whereIs('brand manager')->where('type',2)->where('id','!=',1)->get();

        return view('brand.form', ['brand' => $response ,'brandManagers' => $brandManagers, 'route' => $route, 'edit' => false]);
    }

    /**
     * @param CreateBrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBrandRequest $request)
    {
        $response = $request->handle();

        if ($response == false){
            return redirect()->route('brand.index')->with('error', 'Brand Target Already Set At This Month!')->with('message', 'Brand Add Successfully');
        }

        return redirect()->route('brand.index')->with('message', 'Brand Add Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $request = new GetBrandRequest();

        $request->id = $id;

        $response = $request->handle();

        $brandEmployees = brandEmployee::with('brandAssigneeTo')->where('brand_id',$id)->get();

        return view('brand.show', ['brandDetails' => $response,'brandEmployees' => $brandEmployees]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $request = new GetBrandRequest();

        $request->id = $id;

        $response = $request->handle();

        $route = route('brand.update', ['brand' => $response->id]);

        return view('brand.form', ['brand' => $response, 'route' => $route, 'edit' => true]);
    }

    /**
     * @param UpdateBrandRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->route('brand.index')->with('message', 'Brand Edit Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $brand = brand::find($id);

        $brand->delete();

        return redirect()->route('brand.index')->with('message', 'Brand Deleted Successfully');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function assigneeBrand($id){

        $request = new GetBrandRequest();

        $request->id = $id;

        $response = $request->handle();

        $route = route('submitAssigneeBrand');

        $employees = user::with('emp_department')
            ->whereIs('hod sales and support','sales manager','support manager','sales and support manager','brand manager','sales','support')
            ->where('type',2)->where('id','!=',1)->get();

        $selectedEmployees = brandEmployee::where('brand_id',$id)->pluck('employee_id')->toArray();

        return view('brand.assigneebrand', ['brand' => $response, 'employees' => $employees,'selectedEmployees' => $selectedEmployees, 'route' => $route, 'edit' => false]);
    }


    /**
     * @param AssigneeBrandToEmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAssigneeBrand(AssigneeBrandToEmployeeRequest $request){

        $response = $request->handle();

        return redirect()->route('brand.index')->with('message', 'Brand Assignee Successfully');

    }


    public function assigneeSourceAccount($id){

        $request = new GetBrandRequest();

        $request->id = $id;

        $response = $request->handle();

        $route = route('submitAssigneeSourceAccount');

        $sourceAccounts = SourceAccount::all();

        $selectedSourceAccount = BrandSourceAccount::where('brand_id',$id)->pluck('source_account_id')->toArray();

        return view('brand.assigneesourceaccount', ['brand' => $response, 'sourceAccounts' => $sourceAccounts,'selectedSourceAccount' => $selectedSourceAccount, 'route' => $route, 'edit' => false]);
    }
    public function submitAssigneeSourceAccount(AssigneeBrandToSourceAccountRequest $request){

        $response = $request->handle();

        return redirect()->route('brand.index')->with('message', 'Brand Assignee Successfully');

    }
}
