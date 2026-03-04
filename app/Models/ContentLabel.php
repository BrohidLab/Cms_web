<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ContentLabelObserver;

class ContentLabel extends Model
{
    protected $fillable = ['name','slug'];
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot(): void
    {
        parent::boot();
        self::observe(ContentLabelObserver::class);
    }
    
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_label');
    }
}
