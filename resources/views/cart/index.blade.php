@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Корзина</h1>
                <h2>{{ $cartItemCount ? 'Внутри ' . $cartItemCount . ' товара/(ов)' : 'В корзине пусто!' }}</h2>
            </div>
        </div>
        <div class="row border">
            <div class="col-12 col-md-6">
                @if($cartItemCount > 0)
                    @foreach($products as $product)
                        <div class="card mb-3">
                            <div class="card-text">
                                <span>Количество товара в корзине: {{$product->pivot->quantity}}</span>
                            </div>
                            <a href="{{ route('product.show', $product) }}" class="text-black">
                                <div class="card-header">
                                    <h5 class="card-title border p-2">
                                        {{ $product->title }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $product->description }}

                                    </p>
                                </div>
                                <div class="card-footer">
                                    @if(!empty($product->images[0]->imagePath))
                                        <img class="img-fluid" src="{{ Storage::url($product->images[0]->imagePath) }}"
                                             alt="" style="width: 80px; height: 107px;">
                                    @else
                                        <x-no-image class="border" style="width: 80px; height: 107px;">No Image
                                        </x-no-image>
                                    @endif
                                </div>
                            </a>
                            <div class="card-footer">
                                <div class="card-text">
                                    <span>Добавить/Убавить</span>
                                </div>
                                <form action="{{ route('cart.update', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <button class="btn btn-sm btn-danger" type="submit" name="action"
                                                value="decrease">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" class="form-control" name="change_quantity"
                                               value="{{ $product->pivot->quantity }}" min="1" max="99">
                                        <button class="btn btn-sm btn-success" type="submit" name="action"
                                                value="increase">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex align-items-center justify-content-center text-center" style="height: 200px;">
                        <div>
                            <h2>В корзине пока пусто</h2>
                            <x-link href="{{ route('home') }}">Загляните на главную, чтобы выбрать товары или найдите
                                нужное в поиске
                            </x-link>
                        </div>
                    </div>
                @endif
            </div>


            <div class="col-12 col-md-6 border p-3">

{{--                <form action="{{ route('cart.update', $product->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <x-button class="border">Оформить заказ</x-button>--}}
{{--                    </div>--}}
{{--                </form>--}}

            </div>
        </div>
@endsection
