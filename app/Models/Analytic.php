<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
   	protected $table = 'analytics';
   	
   	    protected $fillable = [
   	        'page',
   	        'url',
   	        'ip_address',
   	        'user_agent'
   	    ];
}
