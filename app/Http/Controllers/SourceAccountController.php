<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceAccount\CreateSourceAccountRequest;
use App\Http\Requests\SourceAccount\GetAllSourceAccountsRequest;
use App\Http\Requests\SourceAccount\GetSourceAccountRequest;
use App\Http\Requests\SourceAccount\UpdateSourceAccountRequest;
use App\Models\SourceAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SourceAccountController extends Controller
{
    /**
     * @param GetAllSourceAccountsRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllSourceAccountsRequest $request)
    {
        $response = $request->handle();

        return view('source-account.index', ['sourceAccounts' => $response]);
    }

    /**
     * @param GetSourceAccountRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetSourceAccountRequest $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('source-account');

        return view('source-account.form', ['sourceAccount' => $response, 'route' => $route, 'edit' => false]);
    }

    /**
     * @param CreateSourceAccountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSourceAccountRequest $request)
    {
        $response = $request->handle();

        return redirect()->route('source-account.index')->with('message', 'Source Account Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SourceAccount  $sourceAccount
     * @return \Illuminate\Http\Response
     */
    public function show(SourceAccount $sourceAccount)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $request = new GetSourceAccountRequest();

        $request->id = $id;

        $response = $request->handle();
        if ($response == false){
            return redirect()->route('source-account.index')->with('error', 'Source Account Not Found !');
        }
        $route = route('source-account.update', ['source_account' => $response->id]);

        return view('source-account.form', ['sourceAccount' => $response, 'route' => $route, 'edit' => true]);
    }

    /**
     * @param UpdateSourceAccountRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSourceAccountRequest $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->route('source-account.index')->with('message', 'Source Account Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SourceAccount  $sourceAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceAccount $sourceAccount)
    {
        //
    }
}
