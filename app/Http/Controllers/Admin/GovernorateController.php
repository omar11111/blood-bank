<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GovernorateController extends Controller
{
    private  function validatePost($request){
        $rules =[
            "name"=>"required|unique:governorates,name",
        ];
        $message = [
            "name.required" => "name must  have value",
        ];
        $this->validate($request,$rules,$message);
    }



    public function index()
    {
        $records = Governorate::paginate(10);
        return view('governorates.index')->with('records',$records);
    }


    public function create()
    {
        return view("Governorates.create");
    }


    public function store(Request $request)
    {
        $this->validatePost($request);
        Governorate::create($request->all());
        return redirect('governorate')->with('status' , 'governorate was create successfully :)');
    }





    public function edit($id)
    {
        $record = Governorate::findOrFail($id);
        return view('governorates.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validatePost($request);
        $record = Governorate::findOrFail($id);
        $record->update($request->all());
        return redirect('governorate')->with('status' , 'governorate was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Governorate::findOrFail($id);
       
        $record->delete();
        return redirect('governorate')->with('status' , 'governorate was deleted successfully :)');
    }
}
