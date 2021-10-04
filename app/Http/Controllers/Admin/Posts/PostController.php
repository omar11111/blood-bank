<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //========================   validate  function
    private  function validatePost($request){
        $rules =[
            "title"=>"required",
            "body" =>"required",
            "image"=>'image|mimes:png,jpg,jpeg|max:1999',
            "category_id"=>"required|exists:categories,id",
        ];
        $message = [
            "title.required" => "title must  have value",
            "body.required" => "description must have value",
            "required" => "category must  have value",
            "exists" => "category must  have valid  value",

        ];
        $this->validate($request,$rules,$message);
    }




    public function index()
    {


        $records = Post::paginate(10);
        return view('Posts.index')->with('records',$records);
    }


    public function create()
    {
        return view("Posts.create");
    }

    public function store(Request $request)
    {

       $this->validatePost($request);
       $post = Post::create($request->all());
       if ($request->image) {
        $filename = time().'.'.$request->image->extension();

       
        $post->image = $filename;
        $request->image->move(public_path('adminlte\img'), $filename);   
       }
       
        $post->save();
        return redirect('posts')->with('status' , 'post was create successfully :)');

    }
    public function show($id)
    {

        $record = Post::findOrFail($id);
        return view('Posts.show',compact('record'));


    }
    public function edit($id)
    {
        $record = Post::findOrFail($id);
        return view('Posts.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {


        $this->validatePost($request);
        $record = Post::findOrFail($id);
        if($record){
            global  $filename;
            $filename = time().'.'.$request->image->extension();
            
            
        
            $this->validatePost($request);
          
           
           
              if($request->hasFile('image')){
              
                if ($record->image) {
                $path=public_path().'\adminlte\img\\'.$record->image;
                unlink($path);
               
                }
               
          }
           
            $record->image = $filename;
            $request->image->move(public_path('adminlte\img'), $filename); 
            
            $record->update($request->all());
            $record->image = $filename;
            $record->save();
            return redirect('posts')->with('status' , 'post was updated successfully :)');

        }
        else{
            return redirect('admin\edit\\'.$id)->with('error' , 'please try again ');

        }

    }


    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        // $path = 'adminlte/images/'.$record->image;
      
        // Storage::disk('public')->delete('adminlte\img\\'.$record->photo);
        if ($record->image) {
            $path=public_path().'\adminlte\img\\'.$record->image;
       
        unlink($path);
        $record->delete();
       
       
        return back();
        }else {
            $record->delete();
       
            return back();  
        }
       
        

    }
}
