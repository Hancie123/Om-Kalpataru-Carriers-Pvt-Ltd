<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profilecontroller extends Controller
{
    public function profile(){
        
        return view('admin/profile');
    }
}