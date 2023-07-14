<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeaModel;
use App\Models\SupplierModel;

class teacontroller extends Controller
{
    public function tea_records(){
        $tea_records=TeaModel::all();
        return view('admin/tea_records',compact('tea_records'));
    }

    public function insertrecord(Request $request){

        $request->validate([
            'date'=>'required',
            'nep_date'=>'required',
            'tea_kg'=>'required',
            'tea_rate'=>'required',
            'water_percent'=>'required',
            'water_kg'=>'required',
            'total_tea_kg'=>'required',
            'total_amount'=>'required',
            'plucked_time'=>'required',
            'remarks'=>'required',
        ]);

        $tearecord=new TeaModel();
        $tearecord->date=$request['date'];
        $tearecord->nep_date=$request['nep_date'];
        $tearecord->tea_kg=$request['tea_kg'];
        $tearecord->tea_rate=$request['tea_rate'];
        $tearecord->water_percent=$request['water_percent'];
        $tearecord->water_kg=$request['water_kg'];
        $tearecord->total_tea_kg=$request['total_tea_kg'];
        $tearecord->total_amount=$request['total_amount'];
        $tearecord->plucked_time=$request['plucked_time'];
        $tearecord->remarks=$request['remarks'];
        $tearecord->status="Unsupplied";
        if($tearecord){
            $tearecord->save();
            return back()->with('success','You have saved the record successfully!');
        }
        else {
            return back()->with('fail','Error Occurred!');
            
        }

        
        
    }

    public function gettearecordById($id){
        $tea=TeaModel::find($id);
        return response()->json($tea);
        
        
    }

    public function updaterecords(Request $request)
{
    $request->validate([
        'date2'=>'required',
        'nep_date2'=>'required',
        'tea_kg2'=>'required',
        'tea_rate2'=>'required',
        'water_percent2'=>'required',
        'water_kg2'=>'required',
        'total_tea_kg2'=>'required',
        'total_amount2'=>'required',
        'plucked_time2'=>'required',
        'remarks2'=>'required',
    ]);


    $id = $request->input('tea_id');
    $tearecord = TeaModel::find($id);

    if (!$tearecord) {
        return back()->with('fail', 'Tea Record Not Found!');
    }

    $tearecord->date=$request['date2'];
        $tearecord->nep_date=$request['nep_date2'];
        $tearecord->tea_kg=$request['tea_kg2'];
        $tearecord->tea_rate=$request['tea_rate2'];
        $tearecord->water_percent=$request['water_percent2'];
        $tearecord->water_kg=$request['water_kg2'];
        $tearecord->total_tea_kg=$request['total_tea_kg2'];
        $tearecord->total_amount=$request['total_amount2'];
        $tearecord->plucked_time=$request['plucked_time2'];
        $tearecord->remarks=$request['remarks2'];
        if($tearecord){
            $tearecord->save();
            return back()->with('success','You have updated the record successfully!');
        }
        else {
            return back()->with('fail','Error Occurred!');
            
        }
}

            public function deleterecord(Request $request, $id)
            {
            $tea = TeaModel::find($id);

            if ($tea) {
                    $supplier = SupplierModel::where('tea_id', $id)->first();

                if ($supplier) {
                    $supplier->delete();
                }

             $tea->delete();
                return back()->with('success', 'You have deleted the record successfully!');
                } else {
                    return back()->with('fail', 'Error Occurred!');
                 }
                    }

}