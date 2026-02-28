<?php

namespace App\Observers;

use App\Models\ProductType;

class ProductTypeObserver
{
    public function creating(ProductType $data) {
        $data->id = generateUuid();
    }
}
