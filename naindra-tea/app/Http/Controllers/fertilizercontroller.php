<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FertilizerModel;

class fertilizercontroller extends Controller
{
    public function fertilizer(){
        $fertilizer=FertilizerModel::all();
        return view('admin/fertilizerexpenses',compact('fertilizer'));
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

        $fertilizer=new FertilizerModel();
        $fertilizer->date=$request['date'];
        $fertilizer->nep_date=$request['nep_date'];
        $fertilizer->product_name=$request['product_name'];
        $fertilizer->rate=$request['rate'];
        $fertilizer->quantity=$request['quantity'];
        $fertilizer->total_amount=$request['total_amount'];
        $fertilizer->remarks=$request['remarks'];
        if($fertilizer){
            $fertilizer->save();
            return back()->with('success','You have successfully saved the fertilizer expenses record');
        }
        else {
            return back()->with('fail','Error Occurred!');

        }

        

}


public function deleterecord($id){

    $fertilizer=FertilizerModel::find($id);
    if(!$fertilizer){
        return back()->with('fail','The record is unable to delete');

    }
    else {
        $fertilizer->delete();
        return back()->with('success','You have deleted the record successfully!');
    }



}
}
