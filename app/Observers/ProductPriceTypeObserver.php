<?php

namespace App\Observers;
use App\Models\ProductPriceType;

class ProductPriceTypeObserver
{
    public function creating(ProductPriceType $data) {
    	$data->id = generateUuid();
    }
}
