@extends('layouts.base')


@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="">Мой контент 1</div>
    <div class="">Мой контент 2</div>
    <div class="">Мой контент 3</div>
@endsection

