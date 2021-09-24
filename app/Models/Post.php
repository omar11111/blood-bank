<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'photo', 'content', 'category_id');

    public function Category_Name()
    {
        return $this->belongsTo('App\Models\Category_name');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}