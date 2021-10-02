<?php

namespace App\Http\Controllers\Api;

use App\Models\Donation;
use App\Models\Token;
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


public function donationRequestCreate(Request $request){
  $validate = validator()->make($request->all(),[
      "name"=>"required",
      "age"=>"required",
      "blood_type_id" =>"required|exists:blood_types,id",
      "bags_num"=>"required:digits",
      "hospital_name"=>"required",
      "hospital_address"=>"required",
      "city_id"=>"required|exists:cities,id",
     ]);
     if($validate->fails()){
      return $this->apiResponse(0,$validate->errors()->first(),$validate->errors());
  }
  $send = "";
$request->user()->Donation()->attach($request->client_id);
  // create donation request
 $donationRequest = $request->user()->Donation()->create($request->all());
 // find  clients suitable for this donation
  $clientsIdes = $donationRequest->city->governorate->clients()
      ->whereHas("bloodTypes",function($q) use ($request){
          $q->where("blood_types.id",$request->blood_type_id);
      })->pluck("clients.id")->toarray();

      //dd($clientsIdes);

  if(count($clientsIdes)){

      $notifications = $donationRequest->notification()->create([

          "title" => "يوجد حاله تبرع ",
          "content" => $donationRequest->blood_type."محتاج متبرع لفصيله "
      ]);
      // add record in    client_notification table
     $notifications->clients()->attach($clientsIdes);

      // push  notification by firebase

      $token = Token::whereIn('client_id',$clientsIdes)
          ->where('token','!=',null)->pluck('token')->toarray();
      if(count($token)){

          $title = $notifications->title;
          $body = $notifications->content;
          $data = [
            'donation_request_id'=>$donationRequest->id
          ];
          $send = notifyByFirebase($title,$body,$token,$data);

      }

  }

  return $this->apiResponse(1,'تم الاضافه بنجاح ',$donationRequest);
}

}

?>
