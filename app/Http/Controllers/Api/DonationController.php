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
    
      
      
     
}

?>
