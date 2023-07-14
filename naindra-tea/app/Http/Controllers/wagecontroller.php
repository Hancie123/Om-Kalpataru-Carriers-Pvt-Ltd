<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WageModel;

class wagecontroller extends Controller
{
    public function insertrecord(Request $request){
        $request->validate([
            'wage'=>'required',
            'wage_kg'=>'required'
        ]);

        $wage=new WageModel();
        $wage->wage_amount=$request->input('wage');
        $wage->wage_kg=$request->input('wage_kg');
        if($wage){
            $wage->save();
            return back()->with('success','You have added the wage amount successfully!');
        }
        else {
            return back()->with('fail','Error Occurred');
        }
        
    }

    public function editrecord(Request $request, $id)
{
    $request->validate([
        'wage' => 'required',
        'wage_kg'=>'required'
    ]);

    $wage = WageModel::find($id);
    if (!$wage) {
        return back()->with('fail', 'The wage id is not found');
    }

    $wage->wage_amount = $request->input('wage');
    $wage->wage_kg=$request->input('wage_kg');
    $wage->save();

    return back()->with('success', 'You have successfully modified the basic wage amount!');
}

}