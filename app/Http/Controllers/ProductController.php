<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::query()->findOrFail($id);
        $images = $product->images()->paginate(3);

        return view('product.show', compact(['product', 'images']));
    }
}
