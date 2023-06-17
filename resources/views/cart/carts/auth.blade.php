@extends('layouts.base')

@section('content')
    <x-container class="">
        @if($cartItemCount>0)
            <div class="mb-2 d-flex justify-content-between">
                <div class="text-start display-6 rounded">Корзина</div>
                <div class="display-6">
                    <x-form action="{{route('cart.deleteAll')}}" method="POST">
                        @csrf
                        <x-button class="border rounded" type="submit">Очистить корзину</x-button>
                    </x-form>
                </div>
            </div>

            <x-table.table class="rounded-5 border">
                <x-table.header class="bg-light">
                    <x-table.col>Наименование</x-table.col>
                    <x-table.col class="text-center">Цена</x-table.col>
                    <x-table.col class="text-center">Количество</x-table.col>
                    <x-table.col class="text-center">Сумма</x-table.col>
                    <x-table.col></x-table.col>
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
                            <x-table.col class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center">
                                    {{$product->price}}
                                </div>
                            </x-table.col>

                            <x-table.col class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center">
                                    <x-form action="{{ route('cart.update', $product->id) }} " method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="d-flex align-items-center">
                                        <button type="submit" name="action" value="increase_quantity">
                                            <i class="bi bi-dash">+</i>
                                        </button>
                                        <input name="quantity" type="number" min="1" max="99"
                                               value="{{$product->pivot->quantity}}">
                                        <button type="submit" name="action" value="decrease_quantity">
                                            <i class="bi bi-plus">-</i>
                                        </button>
                                        </div>
                                    </x-form>
                                </div>
                            </x-table.col>

                            <x-table.col class="text-center align-middle">
                                {{$product->pivot->quantity*$product->price}}
                            </x-table.col>
                            <x-table.col class="text-center align-middle">
                                <x-form action="{{route('cart.delete',$product->id)}}" method="POST">
                                    @csrf
                                    <x-button class="border border-danger text-danger btn-hover-danger"
                                              type="submit">Удалить
                                    </x-button>
                                </x-form>
                            </x-table.col>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table.table>

            <div class="row">
                <div class="col-6">
                    <div class="bg-light shadow rounded border p-2">
                        <div class="text-start display-5 mb-4">Количество товаров: {{ $cartItemCount }}</div>
                        <div class="text-start h3" style="line-height: 1.2;font-weight: 300;">К
                            оплате: {{ $cartPrice }}</div>
                    </div>
                    <div class="col-12">
                        <x-link
                            class="btn border col-12 btn-light text-black p-2 d-flex justify-content-center align-items-center h-50"
                            href="{{route('delivery.create')}}">
                            <p class="display-6">Оформление заказа</p>
                        </x-link>
                    </div>
                </div>
            </div>

        @else
            @include('cart.empty_cart')
        @endif

    </x-container>
@endsection
