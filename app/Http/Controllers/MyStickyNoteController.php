<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StickyNote\CreateMyStickyNote;
use App\Http\Requests\StickyNote\GetAllMyStickyNotes;
use App\Http\Requests\StickyNote\GetMyStickyNote;
use App\Http\Requests\StickyNote\UpdateMyStickyNote;
use App\Models\myStickyNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyStickyNoteController extends Controller
{
    /**
     * @param GetAllMyStickyNotes $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetAllMyStickyNotes $request)
    {
        $response = $request->handle();
        return view('stickynotes.index', ['stickynotes' => $response]);
    }

    /**
     * @param GetMyStickyNote $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetMyStickyNote $request)
    {
        $request->id = 0;

        $response = $request->handle();

        $route = url('my-sticky-note');

        return view('stickynotes.form', ['stickynote' => $response,'route' => $route, 'edit' => false]);
    }

    /**
     * @param CreateMyStickyNote $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateMyStickyNote $request)
    {
        $response = $request->handle();

        return redirect()->route('my-sticky-note.index')->with('message', 'Sticky Note Add Successfully');
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
        $request = new GetMyStickyNote();

        $request->id = $id;

        $response = $request->handleEdit();
        if ($response == false){
            return redirect()->route('my-sticky-note.index')->with('error', 'Sticky Note Not Found !');
        }
        $route = route('my-sticky-note.update', ['my_sticky_note' => $response->id]);

        return view('stickynotes.form', ['stickynote' => $response, 'route' => $route, 'edit' => true]);
    }

    /**
     * @param UpdateMyStickyNote $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMyStickyNote $request, $id)
    {
        $request->id = $id;

        $response = $request->handle();

        return redirect()->route('my-sticky-note.index')->with('message', 'Sticky Note Edit Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $note = myStickyNote::where('id', $id)->where('user_id', $user->id)->first();

        $note->delete();

        return redirect()->route('my-sticky-note.index')->with('message', 'Sticky Not Deleted Successfully');
    }
}
