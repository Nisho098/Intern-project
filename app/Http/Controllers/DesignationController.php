<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Department;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designation = Designation::all();
        return view("backend.dashboard.layouts.Designation.designationTable", ['designations' => $designation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
     
        return view("backend.dashboard.layouts.Designation.createDesignation");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "salary"=>"required",
            

        ]);

        $designation=new Designation;
        $designation->title=$request->title;
        $designation->salary=$request->salary;
       
        $designation->save();
        return redirect()->route('designations.index')->withSuccess("Designation title created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $designation= Designation::find($id);
       
        return view("backend.dashboard.layouts.Designation.editDesignation", [
            'designation' => $designation,
           
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);
        $designation->title = $request->title;
        $designation->salary = $request->salary;
      
        $designation->update();

        return redirect()->route('designations.index')->withSuccess("Designation updated successfully.");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        // $designation=Designation::find($id);
        $designation->delete();
        return back()->withSuccess("designation title deleted sucessfully");

    }
}