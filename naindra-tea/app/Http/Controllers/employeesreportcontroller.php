<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use DB;

class employeesreportcontroller extends Controller
{
    public function employeesreport(){


        $employees = TeaBillModel::join('employees', 'tea_bills.employee_id', '=', 'employees.Employees_ID')
    ->select('employees.Name', DB::raw('SUM(tea_bills.tea_kg) as total_kg'),
    DB::raw('SUM(tea_bills.total_amount) as total'))
    ->groupBy('employees.Name')
    ->orderBy('total_kg', 'desc')
    ->get();


    $count=$employees->count();

    



        return view('admin/employeesreport',compact('employees','count'));
    }
}
