<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use App\Models\employeesmodel;
use App\Models\FertilizerModel;
use App\Models\ChemicalExpensesModel;
use App\Models\TeaModel;
use DB;

class dashboardcontroller extends Controller
{
    public function dashboard(){
    

    $countemployees=EmployeesModel::count();
    // Fetch the sum of 'total_amount' from TeaBillModel
    $totalemployeesamount = TeaBillModel::sum('total_amount');

    // Fetch the sum of 'total_amount' from ChemicalExpensesModel
    $chemicalexpenses = ChemicalExpensesModel::sum('total_amount');

    // Fetch the sum of 'total_amount' from FertilizerModel
    $fertilizerexpenses = FertilizerModel::sum('total_amount');

    $totaltea = TeaModel::select(DB::raw('SUM(total_tea_kg) as total'))->first();

    $teaincome = TeaModel::sum('total_amount');

    $total_expenses=$totalemployeesamount+$chemicalexpenses+$fertilizerexpenses;
    $netprofit=$teaincome-$total_expenses;

    return view('admin/dashboard', compact('countemployees',
    'totalemployeesamount','chemicalexpenses','fertilizerexpenses','totaltea','teaincome','total_expenses','netprofit'));
        
    }
}