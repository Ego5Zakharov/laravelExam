<?php

namespace App\Actions\Products;

use App\Http\Requests\Admin\ProductRequest;
use App\Models\Image;
use App\Support\Values\FileUploader;

class UploadProductImagesAction
{
    public function run(ProductRequest $request, FileUploader $fileUploader)
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
