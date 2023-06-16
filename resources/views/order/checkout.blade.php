@extends('layouts.base')

@section('content')

    <x-container>
        @if($orderItemCount > 0)
            <div class="d-flex justify-content-between align-items-end mb-2 ">
                <div class="text-start display-6">Оплата заказа</div>
                <x-form action="{{route('order.delete',$order->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="btn border border-danger text-danger">Удалить Заказ</x-button>
                </x-form>
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
                        <div class=" display-5 mb-4">Количество товаров: {{ $orderItemCount }}</div>
                        <div class="  h3 mb-4" style="line-height: 1.2;font-weight: 300;">К
                            оплате: {{ $orderPrice }}</div>
                        <div class=" mb-4 d-flex justify-content-around">
                            <x-form action="{{route('order.store',$order->id)}}" method="POST">
                                @csrf
                                <x-button type="submit" class="btn border">Оплатить</x-button>
                            </x-form>

                        </div>
                    </div>
                </div>
            </div>
        @else
            @include('cart.empty_cart')
        @endif
    </x-container>

@endsection
