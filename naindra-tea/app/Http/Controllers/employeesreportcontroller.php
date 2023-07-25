<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use DB;
use App\Models\employeesmodel;

class employeesreportcontroller extends Controller
{
    public function employeesreport(Request $request){

        $name=$request['name'];


        $employees = TeaBillModel::join('employees', 'tea_bills.employee_id', '=', 'employees.Employees_ID')
    ->select('employees.Name', DB::raw('SUM(tea_bills.tea_kg) as total_kg'),
    DB::raw('SUM(tea_bills.total_amount) as total'))
    ->groupBy('employees.Name')
    ->orderBy('total_kg', 'desc')
    ->get();

    $employeesall = EmployeesModel::groupBy('name')
    ->select('name', DB::raw('MAX(Employees_ID) as Employees_ID'))
    ->orderBy('Employees_ID', 'desc')
    ->get();

    $employeesdetails = TeaBillModel::leftJoin('employees', 'tea_bills.employee_id', '=', 'employees.Employees_ID')
    ->select('employees.Name', 'employees.Address', 'employees.Mobile','employees.created_at','employees.date')
    ->where('employees.Name', $name)
    ->groupBy('employees.Name', 'employees.Address', 'employees.Mobile','employees.created_at','employees.date')
    ->get();

    $employeesdate = TeaBillModel::leftJoin('employees', 'tea_bills.employee_id', '=', 'employees.Employees_ID')
    ->select('employees.Name', 'tea_bills.nep_date','tea_bills.date','tea_bills.wage_kg','tea_bills.wage_amount',
    'tea_bills.tea_kg','tea_bills.ot_amount','tea_bills.total_amount',DB::raw('COUNT(tea_bills.employee_id) as ID'))
    ->where('employees.Name', $name)
    ->groupBy('employees.Name', 'tea_bills.nep_date','tea_bills.date',
    'tea_bills.wage_kg','tea_bills.wage_amount','tea_bills.tea_kg','tea_bills.ot_amount','tea_bills.total_amount')
    ->get();



$countbill=TeaBillModel::leftJoin('employees', 'tea_bills.employee_id', '=', 'employees.Employees_ID')
->where('employees.Name', $name)->count();

    $count=$employees->count();
    $count2=$employeesdetails->count();

    
        return view('admin/employeesreport',compact('employees','count',
        'employeesall','employeesdetails','count2','employeesdate','name','countbill'));
    }
}
