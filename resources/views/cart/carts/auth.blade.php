@extends('layouts.base')

@section('content')
    <x-container>
        @if($cartItemCount>0)
            <div class="text-start mb-2">
                <div class="text-start display-6">Корзина</div>
            </div>

            <x-table.table class="">
                <x-table.header class="bg-light">
                    <x-table.col>Наименование</x-table.col>
                    <x-table.col>Цена</x-table.col>
                    <x-table.col>Количество</x-table.col>
                    <x-table.col>Сумма</x-table.col>
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
                            <x-table.col>{{$product->price}}</x-table.col>
                            <x-table.col>
                                <x-form action="{{ route('cart.update', $product->id) }}"
                                        method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" name="action" value="increase_quantity"><i class="bi bi-dash">+</i>
                                    </button>
                                    <input name="quantity" type="number" min="1" max="99"
                                           value="{{$product->pivot->quantity}}">
                                    <button type="submit" name="action" value="decrease_quantity"><i class="bi bi-plus">-</i>
                                    </button>
                                </x-form>
                            </x-table.col>
                            <x-table.col>{{$product->pivot->quantity*$product->price }}</x-table.col>
                            <x-table.col>
                                <x-form action="{{route('cart.delete',$product->id)}}"
                                        method="POST">
                                    @csrf
                                    <x-button type="submit">Удалить</x-button>
                                </x-form>
                            </x-table.col>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table.table>

            <div class="text-start display-5 mb-4">Количество товаров: {{ $cartItemCount }}</div>
            <div class="text-start  h3 mb-4" style="line-height: 1.2;font-weight: 300;">К оплате: {{ $cartPrice }}</div>

            <x-form action="{{route('cart.deleteAll')}}" method="POST">
                @csrf
                <x-button class="border rounded" type="submit">Очистить корзину</x-button>
            </x-form>
        @else
            <div class="container text-center mt-5">
                <img src="https://www.mechta.kz/img/empty-basket.509db28f.svg" alt="Empty basket"
                     style="width: 328px; height: 260px;">
                <div class="h5 mt-4">В корзине пока ничего нет</div>
                <div class="text-muted mt-3">Вы можете начать свой выбор с главной страницы, посмотреть акции или
                    воспользоваться поиском, если ищете что-то конкретное
                </div>
                <div class="row mt-4">
                    <div class="text-center">
                        <x-link class="p-2 btn btn-secondary border-success" href="{{route('search.index')}}">Товары
                        </x-link>
                    </div>
                </div>
            </div>
        @endif
    </x-container>
@endsection
