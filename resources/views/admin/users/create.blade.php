@extends('admin.layouts.base')

@section('admin.title', 'Юзеры')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h6 class="m-0">
                Создать юзера
            </h6>
        </div>

        <div class="card-body">
            @include('admin.users.form', [
                'user' => $user,
                'method' => 'post',
                'action' => route('admin.users.store'),
                'back' => route('admin.users.index'),
            ])
        </div>
    </div>
@endsection
