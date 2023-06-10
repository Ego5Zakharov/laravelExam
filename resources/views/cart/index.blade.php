@extends('layouts.base')

@section('content')
    @if(Auth::check())
        @include('cart.carts.auth')
    @else
        @include('cart.carts.session')
    @endif

@endsection
