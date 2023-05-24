@extends('layouts.base')


@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="email">
            <input type="text" name="name" placeholder="name">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="password_confirmation" placeholder="password again">
            <button type="submit">Отправить</button>
        </form>
    </div>

@endsection
