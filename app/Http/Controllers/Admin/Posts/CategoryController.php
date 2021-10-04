<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category_name;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private  function validatePost($request){
        $rules =[
            "name"=>"required|unique:categories,name",
        ];
        $message = [
            "name.required" => "name must  have value",
        ];
        $this->validate($request,$rules,$message);
    }



    public function index()
    {
        $records = Category_name::paginate(10);
        return view('posts/categories.index')->with('records',$records);
    }


    public function create()
    {
        return view("posts/categories.create");
    }


    public function store(Request $request)
    {
        $this->validatePost($request);
        Category_name::create($request->all());
        return redirect('category')->with('status' , 'governorate was create successfully :)');
    }





    public function edit($id)
    {
        $record = Category_name::findOrFail($id);
        return view('posts/categories.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validatePost($request);
        $record = Category_name::findOrFail($id);
        $record->update($request->all());
        return redirect('category')->with('status' , 'governorate was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Category_name::findOrFail($id);
       
        $record->delete();
        return redirect('category')->with('status' , 'governorate was deleted successfully :)');
    }
}
