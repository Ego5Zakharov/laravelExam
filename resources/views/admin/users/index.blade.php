@extends('admin.layouts.base')

@section('admin.title', 'Юзеры')

@section('admin.action')


        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
            Создать
        </a>
@endsection

@section('admin.content')
    @include('admin.users.table')
@endsection
