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
  public function donations(Request $request){
    $posts=Donation::where(function($query) use($request){

      if ($request->has('donation_id')) {
         $query->where('id',$request->donation_id);
      }elseif ($request->has('blood_type_id')) {
        $query->where('blood_type_id',$request->blood_type_id);
      }



     } )->get();
     
     
    return $this->apiResponse(1 ,'success',$posts);
    

}
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
    
     

      //the clients Who have the same gvovernrates and blood types
      $clientIds=$donation->city->Governorate_Name->Govern_client()->whereHas('Blood_type',function($q) use( $request){
        $q->where('blood_types.id',$request->blood_type_id);
      })->pluck('clients.id')->toArray();
   
      return $this->apiResponse(1,'تم تعديل البيانات  ',$clientIds);
  }
}

?>
