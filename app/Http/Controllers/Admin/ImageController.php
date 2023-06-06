<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy($id)
    {
        $image = Image::query()->findOrFail($id);
        $image->delete();
        flash('Изображение у продукта успешно удалено!', 'success');
        return redirect()->back();
    }
}
