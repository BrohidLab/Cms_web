<?php

namespace App\Observers;

use App\Models\ProductImageBrosur;

class ProductImageBrosurObserver
{
    public function creating(ProductImageBrosur $data){
        $data->id = generateUuid();
    }
}
