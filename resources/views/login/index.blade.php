@extends('layouts.base')

@section('content')

    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Отправить</button>
        </form>



    </div>

@endsection
