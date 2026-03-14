<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $fillable = [
            'profile_id',
            'name',
            'url'
        ];
    
        public function web()
        {
            return $this->belongsTo(WebCms::class);
        }
}
