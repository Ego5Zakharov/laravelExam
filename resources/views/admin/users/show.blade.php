@extends('admin.layouts.base')

@section('admin.title', 'Юзеры')

@section('admin.action', )
    @can('update', $user)
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
            Изменить
        </a>
    @endcan
@endsection

@section('admin.content')
    @include('admin.users.info', ['user' => $user])
    @include('admin.orders.table', ['orders' => $user->orders()->latest('id')->simplePaginate(12)])
@endsection
