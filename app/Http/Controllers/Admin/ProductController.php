<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\UpdateCategoryAction;
use App\Actions\Products\CreateProductAction;
use App\Actions\Products\CreateProductData;
use App\Actions\Products\UpdateProductAction;
use App\Actions\Products\UploadProductImagesAction;
use App\Actions\Users\CreateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
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
        $products = Product::query()->latest('id', 'desc')->paginate(12);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request, FileUploader $fileUploader)
    {
        try {
            $validated = $request->validated();

            $imagesPaths = (new UploadProductImagesAction)->run($request, $fileUploader);

            $data = new CreateProductData(
                title: $validated['title'],
                description: $validated['description'],
                price: new Number($validated['price']),
                quantity: $validated['quantity'],
                published: $validated['published'] ?? false
            );

            $product = (new CreateProductAction)->run($data, $imagesPaths);

            // Добавляем категории продукту
            $categories = $request->input('categories', []);
            $product->categories()->attach($categories);

            flash('Продукт успешно создан!', 'success');
            return redirect()->route('admin.products.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            flash('Произошла ошибка при создании продукта.', 'danger');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::query()->findOrFail($id);

        $images = $product->images()->paginate(3);
        $categories = $product->categories()->get();
        return view('admin.products.show', compact(['product', 'images', 'categories']));
    }

    public function update(UpdateProductRequest $request, Product $product, FileUploader $fileUploader)
    {
        $validated = $request->validated();

        $imagesPaths = (new UploadProductImagesAction)->run($request, $fileUploader);

        $data = (new CreateProductData(
            title: $validated['title'],
            description: $validated['description'],
            price: new Number($validated['price']),
            quantity: $validated['quantity'],
            published: $validated['published'] ?? false
        ));

        $existingCategoriesIds = $product->categories->pluck('id')->toArray();

        $categories = array_diff($request->input('categories', []), $existingCategoriesIds);

        $product->categories()->attach($categories);

        (new UpdateProductAction())->run($data, $product, $imagesPaths);


        flash('Продукт успешно обновлен!', 'success');
        return redirect()->route('admin.products.show', $product);
    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);

        $categories = Category::query()->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function delete($id)
    {
        $product = Product::query()->findOrFail($id);

        if ($product->images->count() > 0) {
            foreach ($product->images as $image) {
                Storage::delete($image->imagePath);
                $image->delete();
            }
        }
        $product->categories()->detach();

        $product->delete();

        flash('Продукт успешно удален!', 'success');
        return redirect()->route('admin.products.index');
    }

    public function categoryDelete($productId, $categoryId)
    {
        $product = Product::query()->findOrFail($productId);

        $category = $product->categories->firstWhere('id', $categoryId);
        if ($category) {
            $product->categories()->detach($category);
            flash('Категория успешно удалена!', 'success');
        } else {
            flash('Категория не найдена!', 'danger');
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {

    }

}
