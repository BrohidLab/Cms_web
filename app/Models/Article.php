<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
        protected $fillable = [
            'title',
            'slug',
            'thumbnail',
            'content',
            'status',
            'published_at'
        ];
    
   	public $incrementing = false;
   	protected $keyType = 'string';

   	public static function boot(): void
   	{
   		parent::boot();
   		self::observe(ArticleObserver::class);
   	}

   	public function labels()
   	{
   	    return $this->belongsToMany(ContentLabel::class, 'article_label');
   	}
}
