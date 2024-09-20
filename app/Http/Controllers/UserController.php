<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\train;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Support\Facades\DB;
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

    public function getDb(){
        // $trains = train::all();
        // // print_r($trains);
        // return view('db',['trains'=>$trains]);

    
        
        // $users=user::all();
        // dd($users);
        // return view("db",compact("users"));

        // $total_orders=order_item::with('user_id')->find(1);
        // echo($total_orders);

        // $user=user::find(3,1)->first();
        // echo $user;
        // $users=user::all();
        // dd($users);


        // print users
        // $users=user::select('u_name','mobile_no as phone')->get();
        // return response()->json($users);
        


        // dinstinct user id in orders
        // $orders=order::select('orders.user_id')->distinct()->get();
        // return response()->json($orders);

        // user name with total price
        // $query=user::join('orders','orders.user_id','=','users.user_id')->select('users.u_name',DB::raw('SUM(orders.final_price) as total_order'))->groupBy('users.u_name')->get();
        // return response()->json($query);
        // return view('db',compact('query'));

        // select order id whose price is more than 200
        // $query=order::select('order_id','final_price')->where('final_price','>=',200)->orderBy('order_id')->get();
        // return response()->json($query);

        // $query=DB::table('restaurants')->select('res_name','res_type')->where   ('res_type','=','veg')->get();
        // return response()->json($query);

    }
}
