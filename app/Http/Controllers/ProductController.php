<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::query()->findOrFail($id);
        $images = $product->images()->paginate(3);
        $feedbacks = $product->feedbacks()->where('visible', true)->get();

        return view('product.show', compact(['product', 'images', 'feedbacks']));
    }
}
