@extends('layouts.base')


@section('content')
    <x-container class="col-md-6">
        <x-form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-label required>Name</x-label>
            <x-input name="name"></x-input>

            <x-label required>Image</x-label>
            <x-input type="file" name="image"></x-input>

            <x-button type="submit">Создать</x-button>
        </x-form>
    </x-container>
@endsection
