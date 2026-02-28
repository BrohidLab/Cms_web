<?php

namespace App\Observers;

use App\Models\ProductColor;

class ProductColorObserver
{
    public function creating(ProductColor $data) {
        $data->id = generateUuid();
    }
}
