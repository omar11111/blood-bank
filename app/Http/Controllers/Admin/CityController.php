<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{  
    private  function validatePost($request){
    $rules =[
        "name"=>"required|unique:cities,name",
        "governorate_id" => "required|exists:governorates,id"
    ];
    $message = [
        "name.required" => "name must  have value",
    ];
    $this->validate($request,$rules,$message);
}




    public function index()
    {
        $records = City::paginate(10);
        return view('cities.index')->with('records',$records);
    }


    public function create()
    {
        return view("cities.create");
    }


    public function store(Request $request)
    {
        $this->validatePost($request);
        City::create($request->all());
        return redirect('city')->with('status' , 'governorate was create successfully :)');
    }





    public function edit($id)
    {
        $record = City::findOrFail($id);
        return view('cities.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validatePost($request);
        $record = City::findOrFail($id);
        $record->update($request->all());
        return redirect('city')->with('status' , 'city was updated successfully :)');
    }


    public function destroy($id)
    {
        $record =City::findOrFail($id);
       
        $record->delete();
        return redirect('city')->with('status' , 'City was deleted successfully :)');
    }
}
