@extends('layouts.base')


@section('content')
    <x-container class="col-6 border mt-5 g-3">
        <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name" class="form-label">Title</label>
            <input class="form-control" type="text" name="name" id="name">

            <label for="Image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <button class="btn " type="submit">Submit</button>
        </form>
    </x-container>
@endsection
