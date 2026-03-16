<?php

namespace App\Models;

use App\Observers\ProductImageObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = ['image', 'product_id', 'type_id', 'color_id', 'is_main'];

    
    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductImageObserver::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }
    
}
