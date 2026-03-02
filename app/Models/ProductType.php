<?php

namespace App\Models;

use App\Observers\ProductTypeObserver;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['product_id', 'name', 'price', 'transmition'];

    
    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductTypeObserver::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'type_id');
    }
}
