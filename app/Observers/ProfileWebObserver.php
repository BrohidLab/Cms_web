<?php

namespace App\Observers;

use App\Models\ProfileWeb;

class ProfileWebObserver
{
    public function creating(ProfileWeb $data) {
        $data->id = generateUuid();
    }
}
