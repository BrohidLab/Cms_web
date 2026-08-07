<?php

namespace App\Observers;

use App\Models\BookingService;

class BookingServiceObserver
{
    public function creating(BookingService $data){
    	$data->id = generateUuid();
    }
}
