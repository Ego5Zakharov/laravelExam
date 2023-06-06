@extends('layouts.base')

@section('content')
    <x-container>
        <x-breadcrumb back="admin.products.index" current="ProductShow"></x-breadcrumb>

        <div class="row border mb-4">
            <div class="col-md-6">
                <div class="text-center fw-bolder h2">{{$product->title}}</div>
                @if($images->count()>0)
                    <div class="mb-4">
                        <img id="main-image" src="{{ Storage::url($product->images[0]->imagePath) }}"
                             class="img-fluid img-thumbnail"
                             alt="Main Image">
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                        <span class="text-muted">No image</span>
                    </div>
                @endif

            </div>

            <div class="col-md-6">
                <div class="text-start">
                    <div class="mb-3">
                        <b>Описание:</b>
                    </div>
                    <div class="mb-3">
                        {{$product->description}}
                    </div>
                    <div class="mb-3">
                        <b>Цена:</b> {{$product->price}}
                    </div>
                    <div class="mb-3">
                        <b>Опубликовано:</b> {{$product->published ? 'Да' : 'Нет'}}
                    </div>

                    <x-form action="{{route('admin.products.delete',$product)}}">
                        <x-button type="submit">Удалить</x-button>
                    </x-form>

                    <x-link href="{{route('admin.products.edit',$product)}}">Редактировать</x-link>

                </div>
            </div>
        </div>
        @if($images->count()>0)
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        @foreach ($images as $key => $image)
                            <div class="col-4 mb-3">
                                <div class="p-1">
                                    <label class="form-check">
                                        <img src="{{ Storage::url($image->imagePath) }}" class="img-thumbnail"
                                             style="width: 100%; max-width: 100%"
                                             alt="Main Image"
                                             onclick="changeMainImage('{{ Storage::url($image->imagePath) }}')">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


    </x-container>

    <script>
        function changeMainImage(imageUrl) {
            // Изменяем главное изображение на выбранное с анимацией
            $('#main-image').fadeOut(200, function () {
                $(this).attr('src', imageUrl).fadeIn(200);
            });
        }
    </script>
@endsection