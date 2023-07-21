<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingcontroller extends Controller
{
    public function setting(){
        return view('admin/settings');
    }
}
