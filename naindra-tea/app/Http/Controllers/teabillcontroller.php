<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employeesmodel;
use App\Models\WageModel;
use App\Models\TeaBillModel;

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
            'date'=>'required',
            'nep_date'=>'required',
            'employee_name'=>'required',
            'wage_kg'=>'required',
            'wage_amount'=>'required',
            'tea_kg'=>'required|numeric',
            'ot_amount'=>'required|numeric',
            'total_amount'=>'required|numeric',
            'remarks'=>'required'
        ]);

        $tea=new TeaBillModel();
        $tea->date=$request['date'];
        $tea->nep_date=$request['nep_date'];
        $tea->employee_id=$request['employee_name'];
        $tea->wage_kg=$request['wage_kg'];
        $tea->wage_amount=$request['wage_amount'];
        $tea->tea_kg=$request['tea_kg'];
        $tea->ot_amount=$request['ot_amount'];
        $tea->total_amount=$request['total_amount'];
        $tea->remarks=$request['remarks'];
        if($tea){
                $tea->save();
                return back()->with('success','You have successfully saved the bill record!');
        }
        else {
                return back()->with('fail','Error Occurred!');
        }
    }

    public function viewteabills(){
        $countwage=WageModel::count();
        $wage=WageModel::all();
        $employee=employeesmodel::all();
        return view('admin/view_tea_bills',compact('employee','countwage','wage'));
    }

    public function fetchteabilldata(){

        $tea=TeaBillModel::join('employees','employees.Employees_ID','=','tea_bills.employee_id')
        ->select('tea_bills.teabill_id','tea_bills.nep_date','employees.Name','tea_bills.wage_kg','tea_bills.wage_amount','tea_bills.tea_kg'
        ,'tea_bills.ot_amount','tea_bills.total_amount','tea_bills.remarks')
        ->get();
        return response()->json(['data'=>$tea]);
    }

    public function getTeaBillById($teabill_id)
{
    $teabill = TeaBillModel::join('employees','employees.Employees_ID','=','tea_bills.employee_id')
    ->select('tea_bills.teabill_id','tea_bills.nep_date','employees.Name','tea_bills.wage_kg','tea_bills.wage_amount','tea_bills.tea_kg'
    ,'tea_bills.ot_amount','tea_bills.total_amount','tea_bills.remarks')->where('teabill_id', $teabill_id)->first();
    
    return response()->json($teabill);
}


public function deletebillrecord($id) {
    $deletedRows = TeaBillModel::where('teabill_id', $id)->delete();

    if ($deletedRows > 0) {
        return response()->json(['status' => 'success', 'message' => 'Bill record deleted successfully.']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Bill record not found.']);
    }
}






}