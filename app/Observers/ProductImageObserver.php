<?php

namespace App\Observers;

use App\Models\ProductImage;

class ProductImageObserver
{
    public function creating(ProductImage $data) {
        $data->id = generateUuid();
    }
}
