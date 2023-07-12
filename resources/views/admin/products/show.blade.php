@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="flex items-center mt-2">
            <x-breadcrumb back="admin.products.index" current="ProductShow" />
        </div>

        <div class="flex flex-col md:flex-row border mb-4">
            <div class="md:w-1/2 flex flex-col items-center py-6">
                <h2 class="text-center font-bold text-2xl mb-2">{{ $product->title }}</h2>
                @if ($images->count() > 0)
                    <div class="mb-4">
                        <img id="main-image" src="{{ Storage::url($product->images[0]->imagePath) }}"
                             class="w-full h-auto rounded-lg shadow-md"
                             alt="Main Image">
                    </div>
                @else
                    <div class="flex justify-center items-center h-40">
                        <span class="text-gray-400 text-2xl">No image</span>
                    </div>
                @endif
            </div>

            <div class="md:w-1/2 p-6">
                <div class="text-start">
                    <div class="mb-3 mt-5">
                        <b>Описание:</b>
                    </div>

                    <div class="mb-3">
                        {{ $product->description }}
                    </div>

                    <div class="mb-3">
                        <b>Цена:</b> {{ $product->price }}
                    </div>

                    <div class="mb-3">
                        <b>Количество на складе:</b> {{ $product->quantity ? $product->quantity : 'Нет на складе!' }}
                    </div>

                    <div class="mb-3">
                        <b>Опубликовано:</b> {{ $product->published ? 'Да' : 'Нет' }}
                    </div>

                    <div class="col-md-6">
                        <div class="text-center font-bold text-lg">Уже имеющиеся категории:</div>
                        @if ($categories->count() > 0)
                            <div class="mb-4">
                                @foreach ($categories as $category)
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $category->name }}</li>
                                    </ul>
                                @endforeach
                            </div>
                        @else
                            <div class="h-40 flex justify-center items-center">
                                <div class="text-center">Категорий нет!</div>
                            </div>
                        @endif
                    </div>

                    <x-form action="{{ route('admin.products.delete', $product) }}" method="POST">
                        @csrf
                        <x-button type="submit">Удалить</x-button>
                    </x-form>

                    <x-link href="{{ route('admin.products.edit', $product) }}">Редактировать</x-link>
                </div>
            </div>
        </div>

        @if ($images->count() > 0)
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-4">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($images as $key => $image)
                            <div class="col-span-1 mb-3">
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

    </div>

    <script>
        function changeMainImage(imageUrl) {
            // Изменяем главное изображение на выбранное с анимацией
            $('#main-image').fadeOut(200, function () {
                $(this).attr('src', imageUrl).fadeIn(200);
            });
        }
    </script>
@endsection
