<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employeesmodel;
use App\Models\WageModel;

class teabillcontroller extends Controller
{
    public function teabill(){
        $countwage=WageModel::count();
        $wage=WageModel::all();
        $employee=employeesmodel::all();
        return view('admin/tea_bill',compact('employee','countwage','wage'));
    }

    public function insertrecord(Request $request){
        $request->validate([
            'nep_date'=>'required',
            'employee_name'=>'required',
            'wage_kg'=>'required'
        ]);
        
    }
}