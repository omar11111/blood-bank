<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_name extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function Post_Name()
    {
        return $this->hasMany('App\Models\Post');
    }

}