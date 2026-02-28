<?php

namespace App\Observers;

use App\Models\ProductGallery;

class ProductGalleryObserver
{
    public function creating(ProductGallery $data) {
        $data->id = generateUuid();
    }
}
