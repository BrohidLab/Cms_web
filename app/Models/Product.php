<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function types()
    {
        return $this->hasMany(ProductType::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Ambil 1 main image saja
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)
                    ->where('is_main', true);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
