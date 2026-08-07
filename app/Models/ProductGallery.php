<?php

namespace App\Models;

use App\Observers\ProductGalleryObserver;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['product_id', 'category', 'image'];
    
    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductGalleryObserver::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
