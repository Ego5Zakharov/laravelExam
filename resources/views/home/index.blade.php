@extends('layouts.base')


@section('content')

    @include('includes.main_header')

    <x-container>
        <div class="">Мой контент 1</div>
        <div class="">Мой контент 2</div>
        <div class="">Мой контент 3</div>

        <div class="row d-flex justify-content-center mt-5 align-items-center">
            <div class="col-6">
                <h1 class="display-5">Отправка сообщений</h1>
                <x-form class="border text-center" action="{{route('send.sms')}}" method="POST">
                    @csrf
                    <x-form-item>
                        <x-input name="to" placeholder="Номер Телефона"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-input name="message" type="text" placeholder="Сообщение"></x-input>
                    </x-form-item>

                    <x-button class="border" type="submit">Отправить сообщение</x-button>
                </x-form>
            </div>
        </div>

    </x-container>
@endsection

