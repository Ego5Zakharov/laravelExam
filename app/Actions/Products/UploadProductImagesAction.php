<?php

namespace App\Actions\Products;

use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Image;
use App\Support\Values\FileUploader;

class UploadProductImagesAction
{
    public function run(ProductRequest|UpdateProductRequest $request, FileUploader $fileUploader)
    {
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $fileUploader->upload($file);
                $imagePaths[] = $path;
            }
        }
        return $imagePaths;
    }
}
