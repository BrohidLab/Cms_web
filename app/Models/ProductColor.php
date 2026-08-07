<?php

namespace App\Models;

use App\Observers\ProductColorObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['type_id', 'name', 'code_color', 'jenis_color', 'code_color2'];

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
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    public function image()
    {
        return $this->hasOne(ProductImage::class, 'color_id');
    }
}
