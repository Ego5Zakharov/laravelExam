@extends('layouts.base')

@section('content')

    {{--  <x-container>--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-6">--}}
    {{--                <form action="{{ route('login.store') }}" method="POST" class="shadow p-5 rounded-4 text-bg-light ">--}}
    {{--                    @csrf--}}
    {{--                    <input type="hidden" name="cart" value="{{ json_encode(session('cart', [])) }}">--}}
    {{--                    <div class="h2 text-center">{{__('Авторизация')}}</div>--}}
    {{--                    <div class="mb-3 ">--}}
    {{--                        <label for="email" class="form-label">{{__('Почта')}}</label>--}}
    {{--                        <input type="email" class="form-control" name="email" id="email" placeholder="egor@mail.ru"--}}
    {{--                               autofocus>--}}
    {{--                    </div>--}}

    {{--                    <div class="mb-3">--}}
    {{--                        <label for="password" class="form-label">{{__('Пароль')}}</label>--}}
    {{--                        <input type="password" class="form-control" name="password" id="password">--}}
    {{--                    </div>--}}

    {{--                    <button class="btn btn-outline-dark">{{__('Войти')}}</button>--}}
    {{--                    <div class="text-end">--}}
    {{--                        <div class="h6">{{__('Еще не зарегистрированы?')}}</div>--}}

    {{--                        <a href="{{route('register')}}"--}}
    {{--                           class="text-decoration-none text-primary">{{__('Зарегистрироваться')}}</a>--}}
    {{--                    </div>--}}

    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--  </x-container>--}}



    <div class="tw-container mt-32 flex justify-center">
        <form action="{{route('login.store')}}" method="POST" class="w-96 space-y-6 ">
            @csrf
            <div class="text-gray-600 text-4xl">Login</div>
            <div class="relative">
                <input type="email" name="email" placeholder="Email"
                       class="focus:outline-none text-lg pl-2 py-2 border-black border-b w-full focus:border-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-7 h-7 absolute right-3 top-3"
                >
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>

            <div class="relative">
                <input type="password" name="password" placeholder="Password"
                       class="focus:outline-none text-lg pl-2 py-2 border-black border-b w-full focus:border-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 absolute right-3 top-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>

            </div>

            <div class="flex justify-between px-2 text-xl">
                <p>Not registered?</p>
                <a href="{{route('register')}}" class="text-blue-400 hover:blue-500 transition-all duration-300">Register</a>
            </div>

            <button
                class="px-10 py-2 text-white border rounded
                 bg-gradient-to-bl from-pink-500 to-pink-700 hover:bg-gradient hover:bg-gradient-to-r
                  hover:from-pink-300 hover:to-pink-600 transition-all duration-300"
                type="submit">Login
            </button>

        </form>
    </div>

@endsection
