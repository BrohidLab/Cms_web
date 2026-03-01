<?php

namespace App\Models;

use App\Observers\ProductColorObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    protected $fillable = ['type_id', 'name', 'code_color'];

    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ProductColorObserver::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo('product_type', 'id', 'type_id');
    }
}
