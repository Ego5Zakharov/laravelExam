@extends('layouts.base')

@section('content')
    <x-container class="tw-container col-md-6 bg-white shadow-lg rounded-lg p-6 mt-6">
        <x-breadcrumb back="user.account.index" current="Редактирование"></x-breadcrumb>

        <form action="{{route('user.account.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center mb-6">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="w-40 h-40 object-cover border rounded-full"
                         alt="User Image">
                @else
                    <div class="w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center">
                        <span class="text-gray-400 text-2xl">No Image</span>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                <input id="name" value="{{$user->name}}" name="name" type="text"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-lg font-medium text-gray-700">Phone</label>
                <input id="phone" value="{{$user->phone}}" name="phone" type="text"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-6">
                <label for="avatar" class="block text-lg font-medium text-gray-700">Image</label>
                <input id="avatar" type="file" name="avatar"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="flex justify-end">
                <x-button type="submit">Обновить</x-button>
            </div>
        </form>
    </x-container>

@endsection
