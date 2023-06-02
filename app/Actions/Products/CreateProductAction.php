<?php

namespace App\Actions\Products;

use App\Models\Image;
use App\Models\Product;

class CreateProductAction
{
    public function run(CreateProductData $data, array $imagePaths)
    {
        $product = Product::query()->create([
            'title' => $data->title,
            'description' => $data->description,
            'price' => $data->price,
            'published' => $data->published
        ]);

        foreach ($imagePaths as $imagePath) {
            $image = new Image();
            $image->imagePath = $imagePath;
            $image->product_id = $product->id;
            $image->save();
        }
    }
}
