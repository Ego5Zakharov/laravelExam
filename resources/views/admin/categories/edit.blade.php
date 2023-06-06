@extends('layouts.base')

@section('content')
    <x-container class="col-md-6">
        <x-breadcrumb back="admin.categories.index" current="CategoryUpdate"></x-breadcrumb>

        <x-form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
            @csrf
            <x-form-item>
                <x-label required>Name</x-label>
                <x-input name="name" value="{{ $category->name }}"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label>Image</x-label>
                @if ($category->image)
                    <img src="{{ Storage::url($category->image) }}" class="img-fluid" alt="Category Image">
                @else
                    <x-no-image>No Image</x-no-image>
                @endif
                <x-input type="file" name="image" value="{{ $category->image}}"></x-input>
            </x-form-item>

            <x-button type="submit" class="border">Обновить</x-button>
        </x-form>
    </x-container>
@endsection
