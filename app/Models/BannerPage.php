<?php

namespace App\Models;

use App\Observers\BannerObserver;
use Illuminate\Database\Eloquent\Model;

class BannerPage extends Model
{
    protected $fillable = ['title', 'sub_title','image', 'pages_name'];
    
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();
        self::observe(BannerObserver::class);
    }
}
