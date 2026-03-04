<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function creating(Article $data) {
           $data->id = generateUuid();
    }
}
