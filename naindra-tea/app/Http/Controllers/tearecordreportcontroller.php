<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use DB;
use App\Models\TeaModel;

class tearecordreportcontroller extends Controller
{
    public function teareportreport(Request $request){
        $teabills = TeaModel::groupBy('remarks')
        ->select('remarks', DB::raw('MAX(tea_id) as tea_id'))
        ->orderBy('tea_id', 'desc')
        ->get();

        $remarks=$request['remarks'];


        $tearecord = TeaModel::select('remarks','nep_date','total_tea_kg','plucked_time','total_amount'
        
    )
    ->where('remarks', $remarks)
    ->get();


    $tearecord2 = TeaModel::select('nep_date')
    ->where('remarks', $remarks)
    ->distinct()
    ->get();



        $count = $tearecord->count();

       



        return view('admin/tea_reports/tea_records',compact('teabills','remarks','tearecord','count','tearecord2'));
    }
}
