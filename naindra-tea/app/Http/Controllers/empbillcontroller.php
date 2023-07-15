<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use DB;

class empbillcontroller extends Controller
{
    public function empbill(Request $request){

        $teabills = TeaBillModel::groupBy('remarks')
    ->select('remarks', DB::raw('MAX(teabill_id) as teabill_id'))
    ->orderBy('teabill_id', 'desc')
    ->get();

    

        $remarks=$request['remarks'];

        $teabillquery = DB::table('tea_bills')
    ->join('employees', 'employees.Employees_ID', '=', 'tea_bills.employee_id')
    ->select('employees.Name', 'tea_bills.remarks',
        DB::raw('MAX(tea_bills.teabill_id) as teabill_id'),
        DB::raw('MAX(tea_bills.nep_date) as nep_date'),
        DB::raw('SUM(tea_bills.wage_kg) as total_wage_kg'),
        DB::raw('SUM(tea_bills.wage_amount) as total_wage_amount'),
        DB::raw('SUM(tea_bills.ot_amount) as total_ot_amount'),
        DB::raw('SUM(tea_bills.tea_kg) as total_tea_kg'),
        DB::raw('SUM(tea_bills.total_amount) as total_amount'))
    ->where('remarks', $remarks)
    ->groupBy('employees.Name', 'tea_bills.remarks')
    ->get();



    $count = $teabillquery->count();

return view('admin.emp_bills', compact('teabills', 'teabillquery','count','remarks'));
    }
}