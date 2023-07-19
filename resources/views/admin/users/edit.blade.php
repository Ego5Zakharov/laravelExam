@extends('admin.layouts.base')

@section('admin.title', 'Юзеры')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h6 class="m-0">
                Изменить юзера
            </h6>
        </div>

        <div class="card-body">
            @include('admin.users.form', [
                'user' => $user,
                'method' => 'put',
                'action' => route('admin.users.update', $user),
                'back' => route('admin.users.show', $user),
            ])
        </div>
    </div>
@endsection
