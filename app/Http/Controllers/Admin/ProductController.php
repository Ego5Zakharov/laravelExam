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
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:50', 'unique:products'],
            'price' => ['required', 'numeric', 'min:50', 'max:10000'],
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'Product already exists',
            'price.required' => 'Price is required',
        ]);

        $product = Product::query()->create([
            'name' => $validated['name'],
            'price' => $validated['price']
        ]);


        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'up_name' => ['required', 'string', 'min:5', 'max:50', Rule::unique('products', 'name')->ignore($request->up_id)],
            'up_price' => ['required', 'numeric', 'min:50', 'max:10000'],
        ], [
            'up_name.required' => 'Name is required',
            'up_name.unique' => 'Product already exists',
            'up_price.required' => 'Price is required',
        ]);

        Product::query()->where('id', $request->up_id)->update([
            'name' => $validated['up_name'],
            'price' => $validated['up_price'],
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function delete(Request $request)
    {
        Product::query()->find($request->product_id)->delete();
        return response()->json(['status' => 'success']);
    }

    public function pagination(Request $request)
    {
        $products = Product::query()->latest()->paginate(5);

        return view('admin.products.pagination', compact('products'));
    }

    public function search(Request $request)
    {
        $products = Product::query()
            ->where('name', 'like', '%' . $request->search_string . '%')
            ->orWhere('price', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        $view = view('admin.products.pagination', compact('products'))->render();
        return response()->json([
            'data' => $view,
        ]);
    }




}
