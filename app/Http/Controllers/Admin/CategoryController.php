<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\CreateCategoryData;
use App\Actions\Categories\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::query()->latest()->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function pagination(Request $request)
    {
        $categories = Category::query()->latest()->paginate(5);
        return view('admin.categories.index_pagination', compact('categories'))->render();
    }

    public function show($id)
    {
        $this->authorize('view', Category::class);

        $category = Category::query()->findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $path = null;

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
        }

        $data = new CreateCategoryData(
            name: $validated['name'],
            image: $path
        );

        (new CreateCategoryAction)->run($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Успешное создание категории!'
        ]);
    }

    public function update(UpdateCategoryRequest $request)
    {
        $this->authorize('update', Category::class);

        $validated = $request->validated();

        $category = Category::findOrFail($request->up_id);

        $path = $category->image;

        if ($request->hasFile('up_image')) {
            $file = $request->file('up_image');
            $path = $file->store('uploads', 'public');
        }

        $data = new CreateCategoryData(
            name: $validated['up_name'],
            image: $path
        );

        (new UpdateCategoryAction)->run($data, $category);

        return response()->json([
            'status' => 'success',
            'message' => 'Успешное обновление категории!'
        ]);
    }


    public function delete(Request $request)
    {
        $this->authorize('delete', Category::class);
        try {
            $category = Category::query()->findOrFail($request->category_id);
            $category->delete();

            return response()->json(['status' => 'success', 'message' => 'Категория успешно удалена!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Ошибка при удалении категории!']);
        }
    }

    public function search(Request $request)
    {
        $categories = Category::query()
            ->where('name', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);
        if ($categories->count() >= 1) {
            return view('admin.categories.index_pagination', compact('categories'))->render();
        }
        return response()->json([
            'status' => 'nothing_found'
        ]);
    }
}

