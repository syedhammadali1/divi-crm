<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\GetAllDepartmentsRequest;
use App\Http\Requests\Role\GetAllRolesRequest;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\GetAllUsersRequest;
use App\Http\Requests\Users\GetUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param GetAllUsersRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllUsersRequest $request)
    {
        $response = $request->handleAllUsers();

        return view('user.index', ['users' => $response]);
    }

    /**
     * @param GetUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetUserRequest $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('tsc-user');

        $getRollRequest = new GetAllRolesRequest();

        $roles = $getRollRequest->handle();

        $getDepartmentRequest = new GetAllDepartmentsRequest();

        $departments = $getDepartmentRequest->handle();

        $reportingManagerRequest = new GetAllUsersRequest(); // For Reporting Manager

        $reportingmanagers = $reportingManagerRequest->reportingManager();

        return view('user.form', ['user' => $response,'departments' => $departments,'reportingmanagers' => $reportingmanagers,'roles' => $roles, 'route' => $route, 'edit' => false]);
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $response = $request->handle();

        return redirect()->route('tsc-user.index')->with('message', 'User Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
        $request = new GetUserRequest();

        $request->id = $id;

        $response = $request->handle();

        if (!isset($response->id)) {
            return redirect()->route('tsc-user.index')->with('error', 'User Not Found !!');
        }

        $route = route('tsc-user.update', ['tsc_user' => $response->id]);

        $getRollRequest = new GetAllRolesRequest();

        $roles = $getRollRequest->handle();

        $getDepartmentRequest = new GetAllDepartmentsRequest();

        $departments = $getDepartmentRequest->handle();

        $reportingManagerRequest = new GetAllUsersRequest(); // For Reporting Manager

        $reportingmanagers = $reportingManagerRequest->reportingManager();

        return view('user.form', ['user' => $response,'departments' => $departments,'reportingmanagers' => $reportingmanagers, 'roles' => $roles, 'route' => $route, 'edit' => true]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->route('tsc-user.index')->with('message', 'User Edit Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('tsc-user.index')->with('message', 'User Deleted Successfully');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */

    public function assigneeUnderEmp($id)
    {
        $leadEmp = User::find($id);

        if (!isset($leadEmp)){
            return redirect()->back()->with('error', 'No Record Found');
        }
        $assigneeEmp = User::with('emp_department')->where('reporting_line',$leadEmp->email)->where('type',2)->get();
        return view('user.asigneemp', ['users' => $assigneeEmp , 'leaduser' => $leadEmp]);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function userActiveInActive(Request $request)
    {
        $user = User::find($request->id);
        if (isset($user)) {
            $user->is_active = $request->status;
            $user->save();
            return true;
        } else {
            return false;
        }

    }

    /**
     * @param Request $request
     */
    public function checkAvailableEmpId(Request $request)
    {
        $user = User::where('emp_id',$request->emp_id)->first();
        if (isset($user)) {
          // Emp ID already Use .
            return 0;
        } else {
            // Emp ID Not Use .
            return 1;
        }

    }
}
