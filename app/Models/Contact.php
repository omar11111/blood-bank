<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'fac_link', 'insta_link', 'tweet_link', 'tube_link');

}