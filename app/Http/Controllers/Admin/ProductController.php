<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        // asc,desc
        $products = Product::query()->latest('id', 'desc')->paginate(100);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('uploads', 'public');
                $image = new Image();
                $image->imagePath = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        flash('Продукт успешно создан!', 'success');
        return redirect()->route('admin.products.index');
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
