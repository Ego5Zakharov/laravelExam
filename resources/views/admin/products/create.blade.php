@extends('layouts.base')


@section('content')
    <div class="container col-6 border mt-5 g-3">
        <x-errors></x-errors>
        <form action="{{route('admin.products.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <label for="title" class="form-label">Title</label>
            <input class="form-control" type="text" name="title">

            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" type="text" name="description"></textarea>

            <label for="price" class="form-label">Price</label>
            <input class="form-control" type="number" name="price">

            <label for="published" class="form-label">isPublished</label>
            <input class="form-check-input" type="checkbox" name="published">

            <input type="file" class="form-control" name="images[]" multiple>

            <button class="btn " type="submit">Submit</button>
        </form>

    </div>

@endsection