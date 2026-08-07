<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\BookingServiceObserver;

class BookingService extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['name', 'email', 'no_wa', 'is_read', 'type_car', 'complaint', 'address'];
    
    protected $casts = [
        'id' => 'string',
    ];
    
    public static function boot(): void
    {
        parent::boot();
        self::observe(BookingServiceObserver::class);
    }
}
