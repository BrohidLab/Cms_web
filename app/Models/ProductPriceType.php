<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ProductPriceTypeObserver;

class ProductPriceType extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_product', 'type_id', 'price', 'transmition'];
    
    protected $casts = [
       'id' => 'string',
    ];
    
    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductPriceTypeObserver::class);
    }

    public function type(){
    	return $this->belongsTo(ProductType::class, 'type_id');
    }
}
