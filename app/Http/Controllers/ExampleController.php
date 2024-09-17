<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function show(){
        $records=['app','cycle','tyre','raw','hit'=>[1,2,3,4,5]];
        return view('example',compact('records'));
    }
}
