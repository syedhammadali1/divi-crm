<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadForm\CreateLeadFormRequest;
use App\Http\Requests\LeadForm\GetAllLeadFormsRequest;
use App\Http\Requests\LeadForm\GetLeadFormRequest;
use App\Http\Requests\Users\GetUserRequest;
use App\Models\LeadForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadFormController extends Controller
{
    /**
     * @param GetAllLeadFormsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllLeadFormsRequest $request)
    {
        $response = $request->handle();

        return view('leadform.index', ['leadforms' => $response]);

    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param CreateLeadFormRequest $request
     */
    public function leadFormGet(CreateLeadFormRequest $request)
    {
        $response = $request->handle();

//        dd($response,'i am create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param GetLeadFormRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(GetLeadFormRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        $route = route('LeadFormFeedBackMessage');

        if (!isset($response->id)){
            return redirect()->back()->with('error', 'No Record Found');
        }

        return view('leadform.leadformdetails', ['leadform' => $response ,'route' => $route]);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $authUser = Auth::user();
        $userRole = $authUser->getRoles()->first();

        $route = route('lead-form.update', ['lead_form' => $id]);

        if ($userRole == 'sales manager'){
            $employees = user::with('emp_department')
                ->whereIs('sales')
                ->where('type',2)->where('id','!=',1)->get();
        }else{
            $employees = user::with('emp_department')
                ->whereIs('sales manager','sales')
                ->where('type',2)->where('id','!=',1)->get();
        }

        $selectedEmployee = LeadForm::where('id',$id)->pluck('assigner_id')->toArray();

        return view('leadform.form', ['employees' => $employees, 'route' => $route, 'edit' => true, 'leadformid' => $id, 'selectedEmployee' => $selectedEmployee]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $leadform =  LeadForm::find($id);
        $leadform->assigner_id = $request->employee ;
        $leadform->save();
        return redirect()->route('lead-form.index')->with('message', 'Lead Form Assignee Successfully');

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function LeadFormFeedBackMessage(Request $request)
    {
        $leadform =  LeadForm::find($request->leadform_id);

        $leadform->feedback_option = $request->feedback ;
        $leadform->feedback_message = $request->feed_back_message ;
        $leadform->save();
        return redirect()->route('lead-form.index')->with('message', 'Lead Form Feed Back Add Successfully');
    }
}
