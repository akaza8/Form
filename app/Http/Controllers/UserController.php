<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function index(Request $request,$name=null){
        echo "hi hello hru ".$name;
        return view("welcome");
    }
    public function contact(Request $request,$company){
        echo "contact to : ".ucfirst($company).' Branch: '.$request->get('branch');
    }
    public function legacy(Request $request){
        echo "This is legacy page";
    }
    public function dashboard(Request $request){
        echo "This is dashboard";
    }   


    // public function show(string $id){
    //     return view("user.profile",['welcome'=>User::findOrFail($id)]);
    // }
    // request
    public function store(Request $request){
        $name = $request->input("name");
        return redirect("/welcome");
    }
    public function update(Request $request, int $id){
        echo response()->json(['message' => "User ID from controller is $id"]);
    }

    public function vote(Request $request){
        echo ucfirst($request->get('age'))." can vote";
    }
}
