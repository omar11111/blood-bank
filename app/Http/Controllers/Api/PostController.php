<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{

  use ApiResponse;

  public function posts(Request $request){
    $posts=Post::where(function($query) use($request){

      if ($request->has('post_id')) {
         $query->where('id',$request->post_id);
      }elseif ($request->has('category_id')) {
        $query->where('category_id',$request->category_id);
      }



     } )->get();
     
     
    return $this->apiResponse(1 ,'success',$posts);
    

}


public function favouritePosts(Request $request)
{
 $rules=[
   'post_id'=>'required|exists:posts,id'
 ];
 $validator=validator()->make($request->all(),$rules);

 if (!$validator) {
   return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
 }

 $toggle=$request->user()->Client_Post()->sync($request->post_id,false);
 return $this->apiResponse(1,'Favorit post linked to it\'s client',$toggle);

}

public function viewFavourite(Request $request)
{
  $posts =$request->user()->Client_Post()->latest()->paginate(20);
  return $this->apiResponse(1,'Loaded',$posts);
}



}

?>
