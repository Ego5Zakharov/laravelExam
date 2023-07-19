@extends('layouts.base')

@section('content')
    <div class="tw-container">
        <div class="flex mt-2">
            <nav class="flex w-full">
                <ul class="flex items-center ">
                    <li>
                        <a href="{{route('user.account.index')}}" class="text-blue-400 font-semibold">
                            Личный кабинет
                        </a>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>

                    <li><a href="#" class="text-gray-700 font-bold opacity-30">Заказы</a></li>
                </ul>
            </nav>
        </div>

        @if($orders->isEmpty())
          @include('user.account.orders.empty')
        @else
            <div class="overflow-x-scroll mt-3">
                <table class="table-auto w-full bg-white shadow-lg rounded-lg">
                    <caption class="caption-top">
                        <p class="text-pink-500 text-3xl whitespace-nowrap">Ваши заказы</p>
                    </caption>
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4">Номер заказа</th>
                        <th class="py-2 px-4">Оплачен</th>
                        <th class="py-2 px-4">Статус</th>
                        <th class="py-2 px-4">Сумма заказа</th>
                        <th class="py-2 px-4">Детали заказа</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="py-4 px-6 border-b">{{$order->id}}</td>
                            <td class="py-4 px-6 border-b">{{$order->is_paid?'Да':'Нет'}}</td>
                            <td class="py-4 px-6 border-b">{{$order->delivery->delivery_status}}</td>
                            <td class="py-4 px-6 border-b whitespace-nowrap">{{(int)$order->details->total_amount->value}} ₸</td>
                            <td class="py-4 px-6 border-b"><a href="{{route('user.account.orders.show',$order->id)}}" class="text-indigo-500">Подробно</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
@endsection
