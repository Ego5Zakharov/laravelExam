@extends('layouts.base')

@section('content')
    <x-container class="col-md-6">
        <x-breadcrumb back="admin.products.index" current="ProductUpdate"></x-breadcrumb>

        <x-form action="{{route('admin.products.updatePOST',$product)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" id="productId" name="productId" value="{{$product->id}}" hidden>
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
                <div class="col-md-6">
                    <x-select name="categories[]" multiple>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </x-select>
                </div>
            </x-form-item>


            <x-form-item>
                <x-label required>isPublished</x-label>
                <x-input checked class="form-check-input" type="checkbox" name="published" value="1"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Добавить файлы</x-label>
                <x-input type="file" class="form-control" name="images[]" multiple></x-input>
            </x-form-item>

            <x-button class="border p-3" type="submit">Обновить</x-button>
        </x-form>

        <div class="col-md-6">
            <div class="text-center fw-bolder h4">Уже имеющиеся категории:</div>
            @if($product->categories->count()>0)
                <div class="mb-4">
                    <x-table.table class="table-bordered">

                        <x-table.header>
                            <x-table.col>#</x-table.col>
                            <x-table.col>Название</x-table.col>
                            <x-table.col>Действие</x-table.col>
                        </x-table.header>

                        <x-table.body>
                            @foreach($product->categories as $category)
                                <x-table.row>
                                    <x-table.col>
                                        {{$category->id}}
                                    </x-table.col>

                                    <x-table.col>
                                        {{$category->name}}
                                    </x-table.col>

                                    <x-table.col>
                                        <x-form
                                            action="{{route('admin.products.deleteCategory',
                                            ['productId' =>$product,'categoryId'=>$category])}}"
                                            method="POST">
                                            @csrf
                                            <x-button class="btn-danger text-dark" type="submit">Удалить</x-button>
                                        </x-form>
                                    </x-table.col>

                                </x-table.row>

                            @endforeach

                        </x-table.body>
                    </x-table.table>

                </div>
            @else
                <div class="" style="height: 200px">
                    <div class="text-center">Категорий нет!</div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="text-center fw-bolder h4">Уже имеющиеся картинки:</div>
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
                // Set the image ID in the hidden form field
                document.getElementById('image-id-input').value = imageId;
                // Submit the form to delete the image
                document.getElementById('delete-form').submit();
            }
        </script>
    @endif
@endsection
