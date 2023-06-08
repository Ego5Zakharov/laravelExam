<?php

namespace App\Actions\Products;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

class UpdateProductAction
{
    public function run(CreateProductData $data, Product $product, array $imagePaths)
    {
        foreach ($imagePaths as $imagePath) {
            $image = new Image();
            $image->imagePath = $imagePath;
            $image->product_id = $product->id;
            $image->save();
        }

        return $product->update([
            'title' => $data->title,
            'description' => $data->description,
            'price' => $data->price,
            'quantity' => $data->quantity,
            'published' => $data->published
        ]);
    }
}
