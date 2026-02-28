<?php

namespace App\Models;

use App\Observers\ProductGalleryObserver;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = ['product_id', 'category', 'image'];
    
    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductGalleryObserver::class);
    }
}
