@extends('layouts.base')

@section('content')
    <x-container>
        @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="col-md-7 d-flex justify-content-center align-items-center pb-2 border bg-light pe-5">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="Аватар"
                                     class="rounded-circle card-img-top me-5"
                                     style="height: 150px; width: 150px">
                            @else
                                <x-no-image>No Image</x-no-image>
                            @endif

                            <div class="col card-text">
                                <h2>{{ $user->name }}</h2>
                                <p>{{ $user->email }}</p>
                                <p>Активность: {{ $user->active ? 'Активен' : 'Неактивен' }}</p>
                                <x-link href="{{route('user.account.edit')}}">Настройки</x-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-container>
@endsection
