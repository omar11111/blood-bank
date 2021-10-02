<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'email', 'password', 'd_o_b','blood_type', 'last_donation_date','city_id', 'blood_type_id');

    public function Blood_type()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function City_id()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function Donation()
    {
        return $this->belongsTo('App\Models\Donation');
    }

    public function Client_Post()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function Client_Governate()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    protected  $hidden=['password','api_token'];
}
