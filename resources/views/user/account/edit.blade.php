@extends('layouts.base')

@section('content')
    <x-container class="col-md-6 bg-light border">
        <x-breadcrumb back="user.account.index" current="Редактирование данных"></x-breadcrumb>

        <x-form action="{{route('user.account.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center align-items-center ">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="img-fluid img-thumbnail" alt="User Image"
                         style="height: 250px; width:250px;">
            </div>

            @else
                <x-no-image class="border">No Image</x-no-image>
            @endif
            <x-form-item>
                <x-label required>Name</x-label>
                <x-input value="{{$user->name}}" name="name"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label>Image</x-label>
                <x-input type="file" name="avatar"></x-input>
            </x-form-item>

            <x-button type="submit">Обновить</x-button>
        </x-form>
    </x-container>
@endsection
