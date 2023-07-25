<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class profilecontroller extends Controller
{
    public function profile(){
        
        return view('admin/profile');
    }

    public function changepassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password'
        ]);
        $email = Session('email');
        $user=User::Where('email',$email )->first();

        if (!$user) {
            return back()->with('fail', 'User not found');
        }
        
        if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('fail','The current password does not match');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();
    Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Password changed successfully');
    
    }
}