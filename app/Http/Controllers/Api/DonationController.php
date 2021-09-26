<?php

namespace App\Http\Controllers\Api;

use App\Models\Donation;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{

  use ApiResponse;
  public function makeDonations(Request $request)
  {
    
      
      
      $validator= Validator::make($request->all(),[
          'name'=>'required|max:50',
          'age'=>'required|numeric|gt:16',
          'bags_num'=>'required|numeric',
          'phone'=>'required|unique:donations|regex:/^01[0-2,5]{1}[0-9]{8}/i',
          'notes'=>'required|string',
          
       ]);
  
       if ($validator->fails()) {
         return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
      }
  
      $donation =Donation::create($request->all());
    
      $donation->save();
      return $this->apiResponse(1,'تم تعديل البيانات  ',$donation);
  }
}

?>
