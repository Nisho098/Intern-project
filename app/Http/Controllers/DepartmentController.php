<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\Branch;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::all();
        return view("backend.dashboard.layouts.Department.departmentTable", ['departments' => $department]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("backend.dashboard.layouts.Department.createDepartment");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "managerName" => "required",
           
            
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->managerName = $request->managerName;

       
        $department->save();

        return redirect()->route('departments.index')->withSuccess("Department created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        // Assuming you want to show a single department's details
        return view("backend.dashboard.layouts.Department.showDepartment", ['departments' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
       
        return view("backend.dashboard.layouts.Department.editDepartment", ['departments' => $department,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
       
$department=Department::find($request->department_id);
        $department->name = $request->name;
        $department->managerName = $request->managerName;
        
       
        $department->update();

        return redirect()->route('departments.index')->withSuccess("Department updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->withSuccess("Department deleted successfully.");
    }
}
