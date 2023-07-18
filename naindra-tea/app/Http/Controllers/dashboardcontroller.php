<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeaBillModel;

class dashboardcontroller extends Controller
{
    public function dashboard(){
        $teabill=TeaBillModel::all();

        // Prepare the data arrays for the chart
    $earningsData = $teabill->pluck('total_amount')->toArray();
    $dates = $teabill->pluck('date')->toArray();

    return view('admin/dashboard', compact('earningsData', 'dates'));
        
    }
}