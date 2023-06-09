<?php

namespace App\Actions\Products;

use App\Models\Image;
use App\Models\Product;

class CreateProductAction
{
    public function run(CreateProductData $data, array $imagePaths)
    {
        $product = new Product;
        $product->title = $data->title;
        $product->description = $data->description;
        $product->price = $data->price;
        $product->published = $data->published;
        $product->quantity = $data->quantity;
        $product->save();

        foreach ($imagePaths as $imagePath) {
            $image = new Image();
            $image->imagePath = $imagePath;
            $image->product_id = $product->id;
            $image->save();
        }
        return $product;

    }
}
