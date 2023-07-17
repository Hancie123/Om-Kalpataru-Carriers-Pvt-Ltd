<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeaBillModel;
use DB;

class reportcontroller extends Controller
{
    public function report(Request $request){
        $teabills = TeaBillModel::groupBy('remarks')
        ->select('remarks', DB::raw('MAX(teabill_id) as teabill_id'))
        ->orderBy('teabill_id', 'desc')
        ->get();

        $remarks=$request['remarks'];

        if (isset($remarks)) {

            $teabillreport = TeaBillModel::select('remarks', 
            DB::raw('SUM(tea_kg) as total_tea_kg'),
            DB::raw('SUM(wage_kg) as total_wage_kg'),
            DB::raw('SUM(wage_amount) as total_wage_amount'),
            DB::raw('SUM(ot_amount) as total_ot_amount'),
            DB::raw('SUM(total_amount) as total_amount2'),
            )
            ->where('remarks', $remarks)
            ->groupBy('remarks')
            ->first();


            $data = []; // Initialize the $data variable as an empty array

            // Retrieve and format the data
            $teaBills = TeaBillModel::select('date', 'tea_kg')
                ->orderBy('date')
                ->get();
            
            foreach ($teaBills as $teaBill) {
                $data[] = [
                    'x' => $teaBill->date,
                    'y' => $teaBill->tea_kg,
                ];
            }
        }

        else {
            $teabillreport = TeaBillModel::select(
                DB::raw('SUM(tea_kg) as total_tea_kg'),
                DB::raw('SUM(wage_kg) as total_wage_kg'),
                DB::raw('SUM(wage_amount) as total_wage_amount'),
                DB::raw('SUM(ot_amount) as total_ot_amount'),
                DB::raw('SUM(total_amount) as total_amount2'),
            )->first();


            
        
        
        }

       


        return view('admin/tea_bill_reports',compact('teabills','teabillreport','remarks'));
    }
}