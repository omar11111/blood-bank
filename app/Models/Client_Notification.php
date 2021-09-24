<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_Notification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('is_read');
    protected $visible = array('client_id');

}