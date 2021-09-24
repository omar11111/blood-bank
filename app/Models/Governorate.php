<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function City_Name()
    {
        return $this->hasMany('App\Models\Citiy');
    }

    public function Govern_client()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}