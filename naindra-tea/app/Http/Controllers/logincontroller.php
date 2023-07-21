<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityModel;

class logincontroller extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
            
        ]);

       $credentials=$request->only('email','password');
       
       $users=User::where('email',$credentials['email'])->first();

      
       
       if(!$users){
        return back()->with('fail','The account does not found');
       }

       if (!Hash::check($credentials['password'], $users->password)) {
        return back()->with('fail', 'Incorrect password');
    }

    elseif($credentials['email'] == $users->email && Hash::check($credentials['password'], $users->password)) {
        Session::put('user_id', $users->id);
        Session::put('email', $credentials['email']);
        Session::put('name', $users->name);

        $activity=new ActivityModel();
        $activity->deviceModel=$request['deviceModel'];
        $activity->osInfo=$request['osInfo'];
        $activity->location=$request['location'];
        $activity->date=$request['date'];
        $activity->user_id=Session()->get('user_id');
        $activity->save();
        return redirect('admin/dashboard')->with('success', 'You have successfully logged in to the system');
    }
    else {
        return back()->with('fail', 'Incorrect email and password!');
    }
    

        
        }


    public function logout(Request $request){
            Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        }
}