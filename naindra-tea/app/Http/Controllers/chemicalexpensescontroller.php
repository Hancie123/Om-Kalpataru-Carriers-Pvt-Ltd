<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChemicalExpensesModel;

class chemicalexpensescontroller extends Controller
{
    public function chemicalexpenses(){
        $chemical=ChemicalExpensesModel::all();
        return view('admin/chemicalexpenses',compact('chemical'));


    }


    public function insertrecord(Request $request){
                $request->validate([
                        'date'=>'date',
                        'nep_date'=>'required',
                        'product_name'=>'required',
                        'rate'=>'required|numeric',
                        'quantity'=>'required|numeric',
                        'total_amount'=>'required|numeric',
                        'remarks'=>'required'

                ]);

                $chemical=new ChemicalExpensesModel();
                $chemical->date=$request['date'];
                $chemical->nep_date=$request['nep_date'];
                $chemical->product_name=$request['product_name'];
                $chemical->rate=$request['rate'];
                $chemical->quantity=$request['quantity'];
                $chemical->total_amount=$request['total_amount'];
                $chemical->remarks=$request['remarks'];
                if($chemical){
                    $chemical->save();
                    return back()->with('success','You have successfully saved the chemical expenses record');
                }
                else {
                    return back()->with('fail','Error Occurred!');

                }

                

    }

    public function deleterecord($id){

        $chemical=ChemicalExpensesModel::find($id);
        if(!$chemical){
            return back()->with('fail','The record is unable to delete');

        }
        else {
            $chemical->delete();
            return back()->with('success','You have deleted the record successfully!');
        }



    }
}
