<?php

namespace App\Models;

use App\Observers\TestimoniObserver;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'image',
        'nama_pelanggan',
        'product_id',
        'ulasan'
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(TestimoniObserver::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
