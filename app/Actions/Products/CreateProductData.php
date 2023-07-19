<?php

namespace App\Actions\Products;

use App\Support\Values\Number;

class CreateProductData
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly Number $price,
        public readonly int    $quantity,
        public readonly bool   $published
    )
    {

    }
}
