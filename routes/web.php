<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::match(['get'],'/',[UserController::class,'index'])->name('index');
// Route::any('/',[UserController::class,'index'])->name('index.any.');


// Route::get('about/{about?}',[UserController::class,'index'])->name("with.or.without.parameter");

// Route::group(["prefix"=> "company"],function(){
//     Route::get('',[UserController::class,'index'])->name('.company');
//     Route::get('/{name}',[UserController::class,'index'])->name('.company.dynamic');

// })->name('group');

Route::prefix('company')->name('group.')->group(function(){
    Route::get('',[UserController::class,'index'])->name('.company');
    Route::get('/{name}',[UserController::class,'index'])->name('.company.dynamic');
});

Route::get('contact/{company}',[UserController::class,'contact'])->name('query.string.input');

// Route::redirect('company/{name}', 'contact{company}', 302);
Route::get("legacy",[UserController::class,'legacy'])->name('legacy');
Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');

Route::redirect('comp','dashboard');


// Route View
Route::view('welcome','welcome',["name"=>"taylor"]);

// Required Parameters
// Route::get('/user/{id}',function(string $id){
//     return 'User '.$id;
// })->name('user');


// for controller
// Route::get('user/{id}',[UserController::class,'show'])->name('conttrol');
// parameterized Route
Route::get('user1/{name?}',function($name=null){
    return $name??"No parameter provided";
});

Route::get('user2/{name}',function($name){
    return $name??"Enter Valid Name";
})/*->whereNumber('name')*/;

Route::get('/search/{search}',function(string $search){
    return $search??'';
})->where('search','.*');

// named route
Route::get('home',function(){
    return "Home Page";
})->name('Home');
Route::get("generate_url",function(){
    $homeurl=route("Home");
    $legacyurl=route("legacy");
    $dashboardurl=route("dashboard");
    $userurl = route("user",['id'=>1]);
    // return response()->json(['homeurl'=>$homeurl,"legacyurl"=>$legacyurl,"dashboardurl"=>$dashboardurl]);
    return "".$homeurl." ".$legacyurl." ".$dashboardurl." ".$userurl;
});

// if group of routes uses same controller
// Route::controller("UserController"::class)->group(function(){
//     Route::get('/','index');
//     Route::get('about/{about?}','index');
// });
Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('about/{about?}', 'index');
});

Route::get('/req',function(Request $request){
    return $request->url();
});
// passing id to controller as parameter
Route::put('user/{id}',[UserController::class,'update']);

Route::get('/first',function(){
    return [1,2,3,4];
});

Route::get('vote',[UserController::class,'vote'])->middleware('check.age')->name("vote");

Route::get('/records',[ExampleController::class,'show']);

Route::get('form',[FormController::class,'showForm'])->name('form.show');
Route::post('submit',[FormController::class,'showData'])->name('form.data');