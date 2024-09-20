<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validate;

class FormController extends Controller
{
    public function showForm(){
        return view("form");
    }
    public function showData(validate $request){
        // dd($request->all());
        $data= $request->all();
        
        // return view("data",[
        //             'name'=>request()->get('name'),
        //             'email'=>request()->get('email'),
                    
        //             'dob'=>request()->get('dob'),
        //             'gender'=>request()->get('gender'),

        //             'degrees'=>request()->get('degrees',[]),
        //             'percentages'=>request()->get('percentages',[]),
        //             // 'name'=>$data['name'],
        //             // 'email'=>$data['email'],
        //             // 'dob'=>$data['dob'],
        //             // 'gender'=>$data['gender'],
        //             // 'degrees'=>$data['degrees'],
        //             // 'percentages'=>$data['percentages'],
                                            
        // ]);
        return view('data',$data);
    }
}
