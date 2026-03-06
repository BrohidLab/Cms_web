<?php

namespace App\Observers;

use App\Models\BannerSlidePage;

class BannerSlideObserver
{
    public function creating(BannerSlidePage $data)
    {
        $data->id = generateUuid();
    }
}
