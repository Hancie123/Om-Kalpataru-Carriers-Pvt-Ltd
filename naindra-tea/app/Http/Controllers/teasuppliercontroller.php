<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeaModel;
use App\Models\SupplierModel;

class teasuppliercontroller extends Controller
{
    public function teasuppliers(){
        $tearecords = TeaModel::where('status', 'Unsupplied')
        ->groupBy('nep_date','remarks')->select('nep_date','remarks')
        ->get();

        $suppliers = TeaModel::join('tea_suppliers', 'tea_suppliers.tea_id', '=', 'tea_records.tea_id')
    ->select('tea_records.tea_id',
    'tea_records.nep_date', 
    'tea_suppliers.updated_at',
    'tea_records.plucked_time',
    'tea_records.remarks',
    'tea_records.tea_kg',
    'tea_records.tea_rate',
    'tea_records.water_percent',
    'tea_records.water_kg',
    'tea_records.total_tea_kg',
    'tea_records.total_amount',
    'tea_suppliers.supplier_name',
    'tea_suppliers.vehicle_number')
    ->where('tea_records.status','Supplied')
    ->get();

    

        return view('admin/tea_suppliers',compact('tearecords','suppliers'));
    }

    public function getTeaData($optionId) {
        $teaData = TeaModel::where('nep_date', $optionId)->where('status','Unsupplied')->get();

        return response()->json($teaData);
    }

    public function insertrecord(Request $request){
        $request->validate([
            'nep_date'=>'required',
            'plucked_time'=>'required',
            'supplier_name'=>'required',
            'vehicle_number'=>'required'
        ]);

        $supplier=new SupplierModel();
        $supplier->date=$request['date'];
        $supplier->nep_date=$request['nep_date'];
        $supplier->plucked_time=$request['plucked_time'];
        $supplier->supplier_name=$request['supplier_name'];
        $supplier->vehicle_number=$request['vehicle_number'];
        $supplier->tea_id=$request['tea_id'];
        if($supplier){
            $supplier->save();
            $id=$request['tea_id'];
            $tearecord=TeaModel::find($id);
            $tearecord->status="Supplied";
            $tearecord->save();
            return back()->with('success','You have successfully saved the supplier record!');
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
                $tea->status="Unsupplied";
                $tea->save();
                return back()->with('success', 'You have deleted the supplier record successfully!');
                } else {
                    return back()->with('fail', 'Error Occurred!');
                 }
                    }

    
}