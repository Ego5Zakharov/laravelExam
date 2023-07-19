<?php

namespace App\Actions\Categories;

use App\Models\Category;

class CreateCategoryAction
{
    public function run(CreateCategoryData $data)
    {
        return Category::query()->create([
            'name' => $data->name,
            'image' => $data->image
        ]);
    }
}
