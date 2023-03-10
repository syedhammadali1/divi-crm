<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd()
        $designations = Designation::latest()->paginate(10);
  
        return view('designations.index',compact('designations'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('designations.create');
    // }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
  
        Designation::create($request->all());
   
        return redirect()->route('designations.index')
                        ->with('success','designation created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    // public function show(Designation $designation)
    // {
    //     return view('designations.show',compact('designation'));
    // }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    // public function edit(Designation $designation)
    // {
    //     return view('designations.edit',compact('designation'));
    // }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, designation $designation)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
  
        $designation->update($request->all());
  
        return redirect()->route('designations.index')
                        ->with('success','designation updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
  
        return redirect()->route('designations.index')
                        ->with('success','designation deleted successfully');
    }
}
