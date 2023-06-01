<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        // asc,desc
        $products = Product::query()->orderBy('id', 'desc')->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }


    public function search(Request $request)
    {

    }
}
