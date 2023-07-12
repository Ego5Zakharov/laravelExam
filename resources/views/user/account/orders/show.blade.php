@extends('layouts.base')

@section('content')

    <div class="tw-container">
        <div class="flex mt-2">
            <nav class="flex w-full">
                <ul class="flex items-center">
                    <li>
                        <a href="{{route('user.account.orders.index')}}" class="text-blue-400 font-semibold">
                            Заказы
                        </a>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>

                    <li><a href="#" class="text-gray-700 font-bold opacity-30">Просмотр заказа</a></li>
                </ul>
            </nav>
        </div>

        <div class="mt-4">
            <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
                <h2 class="text-2xl font-semibold mb-2">Заказ №{{$order->id}}</h2>
                <p class="text-gray-600">Дата создания: {{$order->created_at}}</p>
                <p class="text-gray-600">Статус: {{$order->delivery->delivery_status}}</p>
                <p class="text-gray-600">Общая сумма заказа: {{(int)$order->details->total_amount->value}}₸</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                @foreach($order->products as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        @if($product->images()->count() > 0)
                            <img src="{{ Storage::url($product->images[0]->imagePath) }}" alt="Product Image"
                                 class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-2xl">No Image</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{$product->title}}</h3>
                            <p class="text-gray-600">{{$product->description}}</p>
                            <p class="mt-2 text-gray-700 font-bold">{{(int)$product->price}}₸</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
