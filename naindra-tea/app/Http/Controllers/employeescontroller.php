<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employeesmodel;

class employeescontroller extends Controller
{
    public function employees(){
        $employee=EmployeesModel::all();
        return view('admin/employees',compact('employee'));
    }

    public function insertrecord(Request $request)
{
    $request->validate([
        'name' => 'required|unique:employees,name',
        'address' => 'required'
    ]);

    $employee = new EmployeesModel;
    $employee->Name = $request->input('name');
    $employee->Address = $request->input('address');
    $employee->Mobile = $request->input('mobile');
    $employee->date = $request->input('date');
    
    if ($employee->save()) {
        return back()->with('success', 'You have successfully created the employee account');
    } else {
        return back()->with('fail', 'Error occurred!');
    }
}

    public function getemployeesById($id)
    {
        $employees = EmployeesModel::find($id);
        
        return response()->json($employees);
    }


    public function updaterecords(Request $request)
{
    $request->validate([
        'employees_name' => 'required',
        'employees_address' => 'required'
    ]);

    $id = $request->input('employeeId');
    $employee = EmployeesModel::find($id);

    if (!$employee) {
        return back()->with('fail', 'Employee not found!');
    }

    $employee->Name = $request->input('employees_name');
    $employee->Address = $request->input('employees_address');
    $employee->Mobile = $request->input('employees_mobile');
    $employee->date = $request->input('date');

    if ($employee) {
        $employee->save();
        return back()->with('success', 'You have successfully updated the employee account');
    } else {
        return back()->with('fail', 'Error occurred!');
    }
}


}