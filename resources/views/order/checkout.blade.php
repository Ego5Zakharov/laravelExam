@extends('layouts.base')

@section('content')

    <x-container>
        @if($cartItemCount > 0)
            <div class="text-start mb-2">
                <div class="text-start display-6">Оплата заказа</div>
            </div>

            <div class="row ">
                <div class="col-md-8 ">
                    <x-table.table class="">
                        <x-table.header class="bg-light">
                            <x-table.col>Наименование</x-table.col>
                            <x-table.col>Цена</x-table.col>
                            <x-table.col>Количество</x-table.col>
                            <x-table.col>Сумма</x-table.col>
                        </x-table.header>
                        <x-table.body class="">
                            @foreach($products as $product)
                                <x-table.row>
                                    <x-table.col>
                                        {{$product->title}}<br>
                                        @if(!empty($product->images[0]->imagePath))
                                            <img class="rounded" style="width: 101px;height: 71px;"
                                                 src="{{Storage::url($product->images[0]->imagePath)}}"
                                                 alt="ProductImage">
                                        @endif
                                    </x-table.col>
                                    <x-table.col>{{$product->price}}</x-table.col>
                                    <x-table.col>{{$product->pivot->quantity}}</x-table.col>
                                    <x-table.col>{{$product->pivot->quantity * $product->price}}</x-table.col>
                                </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.table>
                </div>
                <div class="col-md-4">
                    <div class="border rounded-2 text-center">
                        <div class=" display-5 mb-4">Количество товаров: {{ $cartItemCount }}</div>
                        <div class="  h3 mb-4" style="line-height: 1.2;font-weight: 300;">К
                            оплате: {{ $cartPrice }}</div>
                        <div class=" mb-4">
                            <x-button class="btn border">Оплатить</x-button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @include('cart.empty_cart')
        @endif
    </x-container>

@endsection
