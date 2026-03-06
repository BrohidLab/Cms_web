<?php

namespace App\Observers;

use App\Models\Testimonial;

class TestimoniObserver
{
    public function creating(Testimonial $data)
    {
        $data->id = generateUuid();
    }
}
