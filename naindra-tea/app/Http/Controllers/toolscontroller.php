<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class toolscontroller extends Controller
{
    public function tools(){
        return view('admin/tools');
    }
}
