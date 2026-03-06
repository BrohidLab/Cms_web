<?php

namespace App\Observers;

use App\Models\Consultation;

class ConsultationObserver
{
    public function creating(Consultation $data)
    {
        $data->id = generateUuid();
    }
}
