<?php

namespace App\Actions\Categories;

use App\Models\Category;

class UpdateCategoryAction
{
    public function run(CreateCategoryData $data, Category $category)
    {
        return $category->update([
            'name' => $data->name,
            'image' => $data->image
        ]);
    }
}
