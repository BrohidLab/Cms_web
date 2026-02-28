<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function creating(Product $data) {
        $data->id = generateUuid();
    }
}
