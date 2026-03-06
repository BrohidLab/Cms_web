<?php

namespace App\Models;

use App\Observers\BannerSlideObserver;
use Illuminate\Database\Eloquent\Model;

class BannerSlidePage extends Model
{
    protected $fillable = ['files', 'type' ,'pages_name'];
    
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();
        self::observe(BannerSlideObserver::class);
    }
}
