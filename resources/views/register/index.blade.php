@extends('layouts.base')


@section('content')

    <x-container>
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <form action="{{route('register.store')}}" method="POST" class="shadow p-5 rounded-4 text-bg-light">
                    @csrf

                    <div class="mb-3 h2 text-center">Регистрация</div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Почта')}}</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com"
                               autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Имя')}}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>

                    <div class="mb-3">

                        <label for="password">{{__('Пароль')}}</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="password">
                    </div>
                    <div class="mb-3">

                        <label for="password_confirmation" class="form-label">{{__('Повторите пароль')}}</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation"
                               placeholder="password">
                    </div>
                    <button class="btn btn-primary ">{{__('Зарегистрироваться')}}</button>

                    <div class="text-end p-4">
                        <h6>{{__('Уже зарегистрированы?')}}</h6>
                        <a class="text-decoration-none text-primary"
                           href="{{route('login')}}">{{__('Войти')}}</a>
                    </div>

                </form>
            </div>
        </div>
    </x-container>
@endsection
