<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ProfileWebObserver;


class ProfileWeb extends Model
{
	public $incrementing = false;
	protected $fillable = [
        'name',
        'description_short',
        'about',
        'no_wa',
        'email',
        'address',
        'location',
        'google_maps',
        'logo'
    ];
	    
    protected $casts = [
        'id' => 'string',
    ];
    
    public static function boot(): void
    {
        parent::boot();
        self::observe(ProfileWebObserver::class);
    }

    public function socials()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
