<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Donation;
use App\Models\Governorate;
use App\Traits\ApiResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    USE ApiResponse;

    //insert user data into database
    public function register(Request $request)
  {
    $validator= Validator::make($request->all(),[
        'name'=>'required|max:50',
        'phone'=>'required|regex:/^01[0-2,5]{1}[0-9]{8}/i',
        'email'=>'required|email|unique:clients',
        'password'=>'required|confirmed',
        'blood_type'=>'required',
        'd_o_b'=>'required|date|date_format:Y-m-d',
        'last_donation_date'=>'required|date|date_format:Y-m-d',
        'city_id'=>'required',
        
     ]);

     if ($validator->fails()) {
       return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
    }
       $request->merge(['password'=> Hash::make($request->password)]);
       $client =new Client($request->all());

       $client->api_token=Str::random(60);
       $client->code=rand(10000,99999);
       $client->is_active=1;
       $client->save();

        return $this->apiResponse(1, 'تم الأضافة بنجاح',
         ['api_token'=> $client->api_token,
         'client'=>$client]);


}//end of register function

  public function login(Request $request)
  {
    $validator= Validator::make($request->all(),[

        'phone'=>'required|regex:/^01[0-2,5]{1}[0-9]{8}/i',
        'password'=>'required',

     ]);

     if ($validator->fails()) {
        return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
     }


        $client =Client::where('phone',$request->phone)->firstOrFail();

        if ($client) {

            if (Hash::check( $request->password , $client->password) ) {

                return $this->apiResponse(1,'تم تسجيل الدخول',[
                    'api_token'=> $client->api_token,
                    'client'=>$client
                ]);
            }else {
                
                  
              
                return $this->apiResponse(0,'البيانات التى ادخلتها غير ', $request->password );

            }

        }else {

            return $this->apiResponse(0,'البيانات التى ادخلتها غير صحيحة',[]);

        }




}//end of login function

public function forgetPassword(Request $request)
{
    $validator= Validator::make($request->all(),[

        'phone'=>'required|regex:/^01[0-2,5]{1}[0-9]{8}/i',


     ]);

     if ($validator->fails()) {
        return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
     }

    $client =Client::where('phone',$request->phone)->firstOrFail();
    if ($client) {
       

         Mail::to($client->email)->send(new ResetPassword($client->code));
        return $this->apiResponse(1,'تم ارسال كود لتجديد الباسورد على ايميلك',['code'=>$client->code]);
    }else{

        return $this->apiResponse(0,'حدث خطأ حاول مره اخرى');
        
    }


     
}

public function createNewPssword(Request $request)
{
    $validator= Validator::make($request->all(),[
        'code'=>'required|numeric',
        'password'=>'required|confirmed',
        
     ]);

     if ($validator->fails()) {
       return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
    }

    $client =Client::where('code',$request->code)->firstOrFail();
    if ($client) {
     
            
        $request->merge(['password'=> Hash::make($request->password)]);
        
 
        $client->password=$request->password;
        $client->save();
          
           
            return $this->apiResponse(1,'تم تجديد الباسورد بنجاح',$client->password);
      
      
    }else {
        return $this->apiResponse(0,'حدث خطأ حاول مره اخرى',[]);
    }
    

}

// get user data and view it to be edited 


public function profile(Request $request)
{
    $validator= Validator::make($request->all(),[
       
        'phone'=> Rule::unique('clients')->ignore($request->user()->id),
        'email'=>'unique:clients,email,'.$request->user()->id,
        'password'=>'confirmed',
       
     ]);

     if ($validator->fails()) {
       return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
    }
    
   $loginUser=$request->user();

   $loginUser->update($request->all());


    if ($request->has('password')) {
        $loginUser->password=bcrypt($request->password);
    }

    $loginUser->save();

    $data=[
        'client'=>$request->user()->fresh()->load('Client_Governate','Blood_type')
    ];
    return $this->apiResponse(1,'تم تعديل البيانات  ',$data);
}






}

