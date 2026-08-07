<?php

namespace App\Models;

use App\Observers\ProductImageBrosurObserver;
use Illuminate\Database\Eloquent\Model;

class ProductImageBrosur extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['product_id', 'images'];

    protected $casts = [
        'id' => 'string'
    ];

    public static function boot(): void 
    {
        parent::boot();
        self::observe(ProductImageBrosurObserver::class);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
