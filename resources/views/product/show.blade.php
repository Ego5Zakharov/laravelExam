@extends('layouts.base')

@section('content')
    <x-container>

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

                    <div class="mb-3 mt-5">
                        <b>Описание:</b>
                    </div>

                    <div class="mb-3">
                        {{$product->description}}
                    </div>

                    <div class="mb-3">
                        <b>Цена:</b> {{$product->price}}
                    </div>

                    <div class="mb-3">
                        <b>Количество на складе:</b> {{ $product->quantity ? $product->quantity : 'Нет на складе!' }}
                    </div>

                    @if(Auth::check())
                        <x-form action="{{route('cart.add',$product->id)}}" method="POST">
                            @csrf
                            <x-button type="submit">Добавить в корзину</x-button>
                        </x-form>

                    @else
                        <x-form action="{{route('cart.addSession',$product->id)}}" method="POST">
                            @csrf
                            <x-button type="submit">Добавить в корзину(session)</x-button>
                        </x-form>
                    @endif

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

        <div class="row">
            <div class="col-6 border shadow bg-light"><p class="display-5">Отзывы</p></div>
            <div class="col-6 border shadow bg-light">
                <x-button type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <p class="display-5">
                        Оставить отзыв
                    </p>
                </x-button>
            </div>

            @if($product->feedbacks()->count() === 0)
                <div class="col-12 border">
                    <h3 class="display-7 pt-3">
                        Пока отзывов нет.
                        Будьте первыми, поделитесь своим опытом использования товара.
                    </h3>
                </div>
            @else

            @endif
        </div>

    </x-container>
    @include('product.modals.feedback')

@endsection


