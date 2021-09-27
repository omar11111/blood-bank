<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model 
{

    protected $table = 'donations';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'bags_num', 'hospital_address', 'longitude', 'latitude', 'details','phone','goveronrate_id','city_id', 'client_id', 'blood_type_id');

    public function Donation_Blood_Type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }


    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donation_request()
    {
        return $this->belongsToMany('App\Models\Donation');
    }

    public function Client()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notifications');
    }
}