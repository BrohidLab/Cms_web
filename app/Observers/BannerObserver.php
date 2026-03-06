<?php

namespace App\Observers;

use App\Models\BannerPage;

class BannerObserver
{
    public function creating(BannerPage $data)
    {
        $data->id = generateUuid();
    }
}
