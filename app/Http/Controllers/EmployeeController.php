<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view("backend.dashboard.layouts.Users.table", ['employees' => $employees]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $departments = Department::all();
        $designations = Designation::all();
        return view("backend.dashboard.layouts.Users.create",['branches'=>$branches, 'departments'=> $departments,'designations'=>$designations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "number" => "required",
            "address"=>"required",
            "email" => "required|email",
            "branch_id" => "required",
            "department_id" => "required",
            "designation_id" => "required",

           
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->number = $request->number;
        $employee->address= $request->address;
        $employee->email = $request->email;
        $employee->branch_id = $request->branch_id;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;

        

       
        $employee->save();

        return redirect()->route('employees.index')->withSuccess("Employee created successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
         $employees = Employee::find($id);
        return view("backend.dashboard.layouts.Users.edit",['employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $employees = Employee::find($request->employee_id);
        $employees->name = $request->name;
        $employees->number = $request->number;
        $employees->address = $request->address;
        $employees->email = $request->email;
        $employees->update();
    
        return redirect()->route('employees.index')->withSuccess('Employee updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return back()->withSuccess("Employee deleted sucessfully");
    }
}

