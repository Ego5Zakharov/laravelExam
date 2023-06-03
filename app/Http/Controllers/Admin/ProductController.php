<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Products\CreateProductAction;
use App\Actions\Products\CreateProductData;
use App\Actions\Products\UploadProductImagesAction;
use App\Actions\Users\CreateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Support\Values\FileUploader;
use App\Support\Values\Number;
use Faker\Core\File;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    public function store(ProductRequest $request, FileUploader $fileUploader)
    {
        try {

            $validated = $request->validated();

            $imagesPaths = (new UploadProductImagesAction)->run($request, $fileUploader);

            $data = (new CreateProductData(
                title: $validated['title'],
                description: $validated['description'],
                price: new Number($validated['price']),
                published: $validated['published'] ?? false
            ));

            (new CreateProductAction)->run($data, $imagesPaths);

            flash('Продукт успешно создан!', 'success');
            return redirect()->route('admin.products.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            flash('Произошла ошибка при создании продукта.', 'danger');
            return redirect()->back()->withInput();
        }
    }

    public function show(Product $product)
    {
//        $productId = Product::query()->findOrFail($product);
//
//        return view('admin.products.show', compact('productId'));

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
