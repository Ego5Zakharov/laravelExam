@extends('layouts.base')

@section('content')

  <x-container>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('login.store') }}" method="POST" class="shadow p-5 rounded-4 text-bg-light ">
                    @csrf
                    <input type="hidden" name="cart" value="{{ json_encode(session('cart', [])) }}">
                    <div class="h2 text-center">{{__('Авторизация')}}</div>
                    <div class="mb-3 ">
                        <label for="email" class="form-label">{{__('Почта')}}</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="egor@mail.ru"
                               autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('Пароль')}}</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <button class="btn btn-outline-dark">{{__('Войти')}}</button>
                    <div class="text-end">
                        <div class="h6">{{__('Еще не зарегистрированы?')}}</div>

                        <a href="{{route('register')}}"
                           class="text-decoration-none text-primary">{{__('Зарегистрироваться')}}</a>
                    </div>

                </form>
            </div>
        </div>
  </x-container>

@endsection
