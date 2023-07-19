@extends('layouts.base')

@section('content')
    <style>
        .bg-color-custom {
            background-image: linear-gradient(94.18deg, #fae1f3 .59%, #d9f1ff 98.87%);
        }
        .bg-color-custom2 {
            background-color: #fae1f3;
        }
    </style>
    @if(Auth::check() && Auth::user()->id == $user->id)
        <div class="tw-container mt-5  py-2 px-2">
            {{--   breadcrumbs  --}}
            <div class="flex">
                <nav class="flex w-full">
                    <ul class="flex items-center ">
                        <li>
                            <a href="{{route('home')}}" class="text-blue-400 font-semibold">
                                Главная
                            </a>
                        </li>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>

                        <li><a href="#" class="text-gray-700 font-bold opacity-30">Личный кабинет</a></li>
                    </ul>
                </nav>
            </div>
            {{-- Доставка и настройки профиля--}}
            <div class="w-full lg:flex px-2">

                {{-- Профиль --}}
                {{--   Показывает до lg --}}
                <div class="hidden lg:block lg:w-1/2 border lg:rounded-2xl  lg:hover:shadow-md transition-all  ">
                    <div class="flex h-44 justify-center flex-col hover:text-pink-500">
                        <div class="flex-1 ">
                            <div class="flex items-center py-3 px-2 ">
                                @if(empty($user->avatar))
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor"
                                         class="w-24 h-24 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                @else
                                    <img src="{{Storage::url($user->avatar)}}"
                                         alt=""
                                         class="w-24 h-24 object-cover border rounded-full object-center">
                                @endif
                                <div class="flex justify-between w-full ">
                                    <a href="{{route('user.account.edit')}}"
                                       class="flex self-center ml-2 text-xl transition-all font-bold ">{{$user->name}}</a>
                                    <p class="mb-16 mr-2 flex">
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                                 class="w-6 h-6 text-black hover:text-pink-500 transition-all">
                                                <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                                            </svg>
                                        </a>

                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="flex-1 ">
                            <div class="flex justify-between px-2 py-3 whitespace-nowrap">
                                <div class="flex text-gray-500 ">
                                    Телефон <span class="font-semibold ml-2 text-black"> +7 702 342-32-02</span>
                                </div>

                                <div>
                                    <form action="{{route('login.logout')}}" method="POST">
                                        <button type="submit" class="mr-2">
                                            <span class="text-black hover:text-gray-500 transition-all">Выйти</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{--   Показывает после lg --}}
                <div class="w-full lg:hidden mb-2">
                    <div class="flex">
                        @if(empty($user->avatar))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor"
                                 class="w-24 h-24 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        @else
                            <img src="{{Storage::url($user->avatar)}}"
                                 alt=""
                                 class="w-24 h-24 object-cover border rounded-full object-center">
                        @endif
                        <div class="flex flex-col ml-3 justify-center w-full">
                            <div class="flex flex-row justify-between  w-full">
                                <p class="text-xl font-bold mb-1">{{$user->name}}</p>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                         class="w-6 h-6 hover:text-pink-500 transition-all">
                                        <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                                    </svg>
                                </a>
                            </div>
                            <p>+7 707 348-31-01</p>
                            <p><a class="text-pink-500 font-semibold" href="{{route('user.account.edit')}}">Личные
                                    данные</a></p>
                        </div>

                    </div>
                </div>

                {{-- Доставки --}}
                {{--   Показывает до lg --}}
                <div
                    class="hidden lg:block w-full lg:w-1/2 border rounded-xl lg:hover:shadow-md transition-all lg:ml-2 ml-0 bg-color-custom px-1 py-1 hover:text-pink-500">
                    <div class="flex flex-col lg:h-full">
                        <div class="flex-1 ">
                            <div class="flex items-center h-full py-2 px-2">
                                <div class="border-4 border-white rounded-full py-3 px-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"/>
                                    </svg>
                                </div>


                                <a href="#"
                                   class="ml-2 text-xl font-bold transition-all">Доставки</a>
                            </div>
                        </div>
                        <div class="flex-1  whitespace-nowrap">
                            <div class="flex items-end h-full py-2 px-2">
                                <p class="text-gray-500">Ближайшая
                                    <span
                                        class="text-black font-semibold">не ожидается
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--   Показывает после lg --}}
                <div
                    class="lg:hidden w-full lg:w-1/2  rounded-xl lg:hover:shadow-md transition-all lg:ml-2 ml-0 bg-color-custom px-1 py-1">
                    <div class="flex flex-col px-2 py-4">
                        <div class="flex justify-between ">
                            <div>
                                <a href="#"
                                   class=" text-xl font-bold transition-all hover:text-pink-500 mt-2">Доставки</a>
                                <p class="text-gray-500 mt-2">Ближайшая
                                    <span class="text-black font-semibold">не ожидается</span>
                                </p>
                            </div>

                            <div class="rounded-full border-2 border-white py-2 px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-10 h-10 text-pink-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Способы оплаты баланс,чеки и любимые бренды--}}
            <div class="w-full lg:flex mt-2 px-2 lg:space-x-3 lg:space-y-0 space-y-2">
                <div
                    class="w-full lg:w-1/4 border rounded-xl hover:shadow-lg transition-all py-3 px-3 hover:text-pink-500">
                    <a href="#">
                        <div class="flex flex-col space-y-2">
                            <div class="w-full">
                                <a href="#" class="text-2xl font-bold">Способы оплаты</a>
                                <p class="text-gray-500">**121 8/27</p>
                            </div>

                        </div>
                    </a>
                </div>

                <div
                    class="w-full lg:w-1/4 border rounded-xl hover:shadow-lg transition-all py-3 px-3 hover:text-pink-500">
                    <a href="{{route('payment.index')}}">
                        <div class="flex flex-col">
                            <p class="text-2xl font-bold lg:mt-2">Баланс</p>
                            <p class="text-gray-500"><span>{{$user->balance}} ₸</span></p>
                        </div>
                    </a>
                </div>

                <div
                    class="w-full lg:w-1/4 border rounded-xl hover:shadow-lg transition-all py-3 px-3 hover:text-pink-500">
                    <a href="#">
                        <div class="flex flex-col">
                            <p class="text-2xl font-bold lg:mt-2">Чеки</p>
                            <p class="text-gray-500">Смотреть</p>
                        </div>
                    </a>
                </div>

                <div
                    class="w-full lg:w-1/4 border rounded-xl hover:shadow-lg transition-all py-3 px-3 hover:text-pink-500">
                    <a href="#">
                        <div class="flex flex-col">
                            <p class="text-2xl font-bold lg:mt-2">Любимые бренды</p>
                            <p class="text-gray-500">0 брендов</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Заказы --}}
            <div class="px-2 mt-2">
                <div
                    class="w-full border bg-color-custom2 rounded-xl hover:shadow-lg transition-all py-3 px-3 hover:text-pink-500">
                    <a href="{{route('user.account.orders.index')}}">
                        <div class="flex flex-col ">
                            <div class="w-full">
                                <p  class="text-2xl font-bold">Заказы</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    @endif
@endsection
