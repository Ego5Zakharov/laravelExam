@extends('layouts.base')

@section('content')
    <style>
        .custom-text-primary {
            color: #e61771;
        }
    </style>

    <div class="tw-container mt-4">
        {{--breadcrumbs--}}
        <div class="flex">
            <nav class="flex w-full">
                <ul class="flex items-center">
                    <li>
                        <a href="{{route('home')}}" class="text-blue-400 font-semibold">
                            Главная
                        </a>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>

                    <li><a href="#" class="text-gray-700 font-bold opacity-30">Корзина</a></li>
                </ul>
            </nav>
        </div>

        @if($cartItemCount > 0)
            <div class="mb-2 flex justify-between">
                <div class="mt-2">
                    <p class="font-bold text-3xl">Корзина <span
                            class="text-gray-500 text-3xl">({{$cartItemCount}})</span></p>
                </div>
            </div>
            <div class="w-full lg:flex px-1">
                <div class="w-full lg:w-9/12 mb-3 space-y-2">
                    @foreach($products as $product)
                        <div class="border rounded bg-gray-50 hover:shadow mb-4">
                            <div class="mb-2 flex justify-between">
                                <div class="mt-2">
                                    <p class="text-gray-500 text-2xl">Код предмета: <span
                                            class="text-black font-bold text-xl">1402684</span></p>
                                </div>
                                <div class="mt-2 mr-2 flex space-x-2">
                                    <form action="{{ route('cart.deleteCartSessionProduct', $product['id']) }}"
                                          method="POST">
                                        @csrf
                                        <button class="border rounded-full px-2 py-2 hover:bg-white" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <button class="border rounded-full px-2 py-2 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="w-full lg:flex border">
                                <div class="w-full lg:w-4/5">
                                    <div class="flex items-center">
                                        @if($product['image'])
                                            <img class="w-24 h-24 object-cover"
                                                 src="{{Storage::url($product['image']) }}" alt="">
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                            </svg>
                                        @endif
                                        <div class="font-semibold">{{$product['title']}}</div>
                                    </div>
                                </div>

                                <div class="w-full lg:w-1/5">
                                    <div class="flex lg:justify-center justify-end lg:items-center h-full">
                                        <div class="flex justify-center items-center">
                                        <form action="{{ route('cart.updateSessionProduct', $product['id']) }}"
                                                method="POST">
                                            @csrf
                                            <div class="flex items-center space-x-1 lg:mr-6 mr-2">
                                                <div class="font-semibold mr-1">{{$product['price']}}₸</div>
                                                <button class="border rounded-full bg-gray-50 hover:bg-white"
                                                        type="submit" name="action" value="increase_quantity">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                                    </svg>
                                                </button>
                                                <input class="w-10 border rounded text-center font-bold" name="quantity"
                                                       type="number" min="1" max="99"
                                                       value="{{ $product['quantity'] }}">
                                                <button class="border rounded-full bg-gray-50 hover:bg-white"
                                                        type="submit" name="action" value="decrease_quantity">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M19.5 12h-15"/>
                                                    </svg>
                                                </button>
                                                <button type="submit" name="action" value="set_quantity">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="w-full lg:w-3/12 h-28 lg:ml-5 rounded bg-gray-50 hover:shadow">
                    <div class="flex justify-between py-2">
                        <p class="whitespace-nowrap ml-1 text-gray font-semibold text-xl">Сумма к оплате:</p>
                        <p class="whitespace-nowrap mr-3 font-bold">{{$cartPrice}} ₸</p>
                    </div>
                    <div class="flex border-t">
                        <a class="w-full py-3 text-center custom-text-primary text-3xl"
                           href="{{route('delivery.create')}}">Оформить заказ</a>
                    </div>
                </div>
            </div>
        @else
            @include('cart.empty_cart')
        @endif
    </div>
@endsection
