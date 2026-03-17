<?php

namespace App\Models;

use App\Observers\ConsultationObserver;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'name',
        'no_wa',
        'product_id',
        'lokasi',
        'pesan',
        'read_at'
    ];

    public static function boot(): void
    {
        parent::boot();
        self::observe(ConsultationObserver::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
