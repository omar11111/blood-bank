<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category_name;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Setting;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GeneralApiController extends Controller
{
    use ApiResponse;
    
    public function cities(Request $request){
        $cities=City::where(function($query) use($request){

         if ($request->has('governorate_id')) {
            $query->where('governorate_id',$request->governorate_id);
         }

        } )->get();
        return $this->apiResponse(1 ,'success',$cities);
        

    }

   
    public function governorates(){
        $posts=Governorate::all();

        return $this->apiResponse(1 ,'success',$posts);
        

    }
    public function contacts(){
        $posts=Contact::all();

        return $this->apiResponse(1 ,'success',$posts);
        

    }
    public function bloodTypes(){
        $posts=BloodType::all();

        return $this->apiResponse(1 ,'success',$posts);
        

    }
    public function categories(){
        $posts=Category_name::all();

        return $this->apiResponse(1 ,'success',$posts);
        

    }

    public function settings(){
        $posts=Setting::all();

        return $this->apiResponse(1 ,'success',$posts);
        

    }
}
