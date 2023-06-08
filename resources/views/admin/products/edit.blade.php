@extends('layouts.base')

@section('content')
    <x-container class="col-md-6">
        <x-breadcrumb back="admin.products.index" current="ProductUpdate"></x-breadcrumb>

        <x-form action="{{route('admin.products.update',$product)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form-item>
                <x-label required>Title</x-label>
                <x-input value="{{$product->title}}" name="title"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Description</x-label>
                <x-textarea name="description">{{$product->description}}</x-textarea>
            </x-form-item>

            <x-form-item>
                <x-label required>Price</x-label>
                <x-input value="{{$product->price}}" type="number" name="price"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Quantity</x-label>
                <x-input value="{{$product->quantity}}" type="number" name="quantity"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>isPublished</x-label>
                <x-input checked class="form-check-input" type="checkbox" name="published" value="1"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Добавить файлы</x-label>
                <x-input type="file" class="form-control" name="images[]" multiple></x-input>
            </x-form-item>

            <x-button type="submit">Обновить</x-button>
        </x-form>

        <div class="row">
            @if($product->images()->count() > 0)
                @foreach($product->images as $image)
                    <div class="col-3">
                        <img class="img-fluid" src="{{Storage::url($image->imagePath)}}" alt="">
                        <div class="mt-2">
                            <button type="button" class="btn btn-danger" onclick="deleteImage({{$image->id}})">Удалить
                            </button>
                        </div>
                    </div>
                @endforeach
        </div>
        @endif
    </x-container>

    @if($product->images()->count() > 0)
        <form id="delete-form" action="{{route('admin.images.destroy',$image)}}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="image_id" id="image-id-input">
        </form>

        <script>
            function deleteImage(imageId) {
                // Устанавливаем ID изображения в скрытое поле формы
                document.getElementById('image-id-input').value = imageId;
                // Отправляем форму для удаления изображения
                document.getElementById('delete-form').submit();
            }
        </script>
    @endif

@endsection
