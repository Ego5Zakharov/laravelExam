@extends('layouts.base')


@section('content')
    <x-container class="col-4 border mt-5 g-3">

        <x-breadcrumb back="admin.products.index" current="ProductCreate"></x-breadcrumb>

        <x-form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" method="POST">
            @csrf

            <x-form-item>
                <x-label required>Title</x-label>
                <x-input name="title"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Description</x-label>
                <x-textarea name="description"></x-textarea>
            </x-form-item>

            <x-form-item>
                <x-label required>Price</x-label>
                <x-input type="number" name="price"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Quantity</x-label>
                <x-input type="number" name="quantity"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label class="" required>isPublished</x-label>
                <x-input class="form-check-input" type="checkbox" name="published" value="1"></x-input>
            </x-form-item>

            <x-form-item>
                <x-label required>Категории</x-label>

                <select name="categories[]" class="form-select" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </x-form-item>

            <x-form-item>
                <x-label required>Description</x-label>
                <x-input type="file" class="form-control" name="images[]" multiple></x-input>
            </x-form-item>

            <x-button type="submit">Создать</x-button>


        </x-form>

    </x-container>

@endsection
