<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportcontroller extends Controller
{
    public function report(){
        return view('admin/reports');
    }
}
