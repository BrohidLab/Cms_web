<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    
    protected $fillable = ['name', 'slug', 'description', 'seater', 'cc', 'status'];
    
    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductObserver::class);
    }
}
