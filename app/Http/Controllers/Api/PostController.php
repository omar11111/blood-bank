<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{

  use ApiResponse;
  public function posts(){
    $posts=Post::all();

    return $this->apiResponse(1 ,'success',$posts);
    

}
}

?>
