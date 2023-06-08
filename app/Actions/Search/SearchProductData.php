<?php

namespace App\Actions\Search;

use App\Models\Product;

class SearchProductData
{
    public function run(string $orderBy, $search)
    {
        return Product::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhereHas('categories', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->where('published', true)
            ->orderBy('price', $orderBy)
            ->paginate(12);
    }

    public function default($search)
    {
        return Product::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhereHas('categories', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->where('published', true)
            ->paginate(12);
    }
}
