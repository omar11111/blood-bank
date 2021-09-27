<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function City_Name()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function Governorate_Name()
    {
        return $this->belongsTo('App\Models\Governorate','governorate_id');
    }

    public function Donation()
    {
        return $this->hasMany('App\Models\Donation');
    }

}
