<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\CreateCategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
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

        $category = (new CreateCategoryAction)->run($data);

        flash('Категория успешно создана!', 'success');
        return redirect()->route(('admin.categories.show'), $category);
    }

    public function update()
    {
        return view('admin.categories.update');
    }

    public function edit()
    {
    }

    public function delete($id)
    {
        $category = Category::query()->findOrFail($id);

        if ($category->delete()) {
            flash('Категория успешно удалена!', 'success');
            return redirect()->route('admin.categories.index');
        } else {
            flash('Ошибка при удалении категории.', 'error');
            return back();
        }
    }
}
