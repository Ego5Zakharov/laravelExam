<?php

namespace App\Actions\Categories;

class CreateCategoryData
{
    public function __construct(
        public readonly string $name,
        public readonly string $image
    )
    {

    }
}
