@extends('admin.layouts.base')

@section('admin.title', 'Логи')

@section('admin.content')
    @include('admin.logs.table')
@endsection
