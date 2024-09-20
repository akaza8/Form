<?php

namespace App\Http\Controllers;
use App\Http\Requests\validate;
use App\Http\Requests\ValidateHotel;
use Illuminate\Http\Request;
use App\Models\Hotel;

class LayoutFormController extends Controller
{
    public function showForm($id=null)
    {
        $hotel=$id?Hotel::findOrFail($id):null;
        return view('admin.index',compact('hotel')); 
    }

   
    public function showData()
    {
        // $data = $request->validated();
        $hotels=Hotel::all();
        return view('admin.data', compact('hotels'));
    }

    public function store(ValidateHotel $request){
        $data=$request->validated();
        Hotel::create($data);
        return redirect()->route('hotel.data')->with('success','form submitted successfully');

    }
    public function update(ValidateHotel $request,$id){
        $data=$request->validated();
        $hotel=Hotel::findOrFail($id);
        $hotel->update($data);
        return redirect()->route('hotel.data')->with('success','Data Updated Successfully');
    }
}
