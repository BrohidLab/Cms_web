<?php

namespace App\Observers;
use App\Models\ContentLabel;

class ContentLabelObserver
{
    public function creating(ContentLabel $data)
    {
        $data->id = generateUuid();
    }
}
