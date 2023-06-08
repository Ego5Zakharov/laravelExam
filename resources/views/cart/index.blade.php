@extends('layouts.base')

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12">
                <div class="h1">Корзина</div>
                <h2>{{ $cartItemCount ? 'Внутри ' . $cartItemCount . ' товара/(ов)' : 'В корзине пусто!' }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                @foreach($products as $product)
                    <x-card>
                        <x-link href="{{ route('product.show', $product) }}" class="text-black">
                            <x-card-header>
                                <x-card-title class="border p-2">
                                    {{$product->title}}
                                </x-card-title>
                            </x-card-header>
                            <x-card-body>
                                <x-card-text>
                                    {{$product->description}}
                                    <span id="quantity_{{ $product->id }}">{{ $product->pivot->quantity }}</span>
                                </x-card-text>
                            </x-card-body>
                            <x-card-footer>
                                <img class="img-card img-fluid"
                                     src="{{ Storage::url($product->images[0]->imagePath) }}"
                                     alt=""
                                     style="width: 80px; height: 107px;">
                            </x-card-footer>
                        </x-link>
                        <div>
                            <form action="{{ route('cart.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-danger" type="submit" name="action" value="decrease">-</button>
                                <button class="btn btn-sm btn-success" type="submit" name="action" value="increase">+</button>

                                <input type="number" name="change_quantity" value="1" min="1" max="99">
                            </form>
                        </div>
                    </x-card>
                @endforeach
            </div>
        </div>
    </x-container>
@endsection
