<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class usercontroller extends Controller
{
    public function insertdata(Request $request){
        
        $validation=$request->validate([
            'name'=>'required',
            'email1'=>'required| unique:users,email',
            'password1'=>'required',
            
        ]);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email1;
        $user->password=Hash::make($request->password1);
        if($user){
            $user->save();
            return back()->with('success','The account has been created successfully');
            
        }
        else {
            return back()->with('fail','error occurred');
            
        }
        
        
    }
}