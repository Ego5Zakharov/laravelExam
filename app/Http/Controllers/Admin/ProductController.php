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
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        // asc,desc
        $products = Product::query()->latest()->paginate(5);
        $categories = Category::query()->get();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function pagination()
    {
        $products = Product::query()->latest()->paginate(5);
        return view('admin.products.index_pagination', compact('products'));
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

            return response()->json([
                'status' => 'success',
                'message' => 'Успешное создание товара!'
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Ошибка!'
            ]);
        }
    }

    public function show($id)
    {
        $product = Product::query()->findOrFail($id);

        $images = $product->images()->paginate(3);
        $categories = $product->categories;

        return view('admin.products.show', compact(['product', 'images', 'categories']));
    }

    public function update(UpdateProductRequest $request, FileUploader $fileUploader)
    {
        $validated = $request->validated();
        $product = Product::query()->find($request->productId);

        $imagesPaths = (new UploadProductImagesAction)->run($request, $fileUploader);

        $data = (new CreateProductData(
            title: $validated['title'],
            description: $validated['description'],
            price: new Number($validated['price']),
            quantity: $validated['quantity'],
            published: $validated['published'] ?? false
        ));

        $existingCategoriesIds = $product->categories->pluck('category_id')->toArray();

        $categories = $request->input('categories', []);
        if (!is_array($categories)) {
            $categories = [];
        }

        $categoriesToAttach = array_diff($categories, $existingCategoriesIds);

        $product->categories()->attach($categoriesToAttach);

        (new UpdateProductAction())->run($data, $product, $imagesPaths);

        return response()->json([
            'status' => 'success',
            'message' => 'Успешное обновление товара!'
        ]);
    }


    public function updatePOST(UpdateProductRequest $request, FileUploader $fileUploader)
    {

        $validated = $request->validated();
        $product = Product::query()->find($request->productId);

        $imagesPaths = (new UploadProductImagesAction)->run($request, $fileUploader);

        $data = (new CreateProductData(
            title: $validated['title'],
            description: $validated['description'],
            price: new Number($validated['price']),
            quantity: $validated['quantity'],
            published: $validated['published'] ?? false
        ));

        $existingCategoriesIds = $product->categories->pluck('category_id')->toArray();

        $categories = $request->input('categories', []);
        if (!is_array($categories)) {
            $categories = [];
        }

        $categoriesToAttach = array_diff($categories, $existingCategoriesIds);

        $product->categories()->attach($categoriesToAttach);

        (new UpdateProductAction())->run($data, $product, $imagesPaths);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);

        $categories = Category::query()->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function delete(Request $request)
    {
        try {
            $product = Product::query()->findOrFail($request->productId);

            if ($product->images->count() > 0) {
                foreach ($product->images as $image) {
                    Storage::delete($image->imagePath);
                    $image->delete();
                }
            }

            $product->categories()->detach();
            $product->delete();

            return response()->json(['status' => 'success', 'message' => 'Товар успешно удален!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Ошибка удаления товара!']);
        }
    }

    public function imageDelete(Request $request)
    {
        $product = Product::query()->findOrFail($request->productId);

        $image = $product->images->firstWhere('id', $request->imageId);
        if ($image) {
            Storage::delete($image->imagePath);
            $image->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Успешное удаление картинки!'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Ошибка удаления!'
        ]);
    }

    public function categoryDelete(Request $request)
    {
        $product = Product::query()->findOrFail($request->productId);

        $category = $product->categories->firstWhere('id', $request->categoryId);
        if ($category) {
            $product->categories()->detach($category);
            return response()->json([
                'status' => 'success',
                'message' => 'Успешное удаление категории'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Ошибка удаления!'
        ]);
    }

    public function search(Request $request)
    {

    }

}
