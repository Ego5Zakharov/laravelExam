@extends('layouts.base')

@section('content')
    <x-container>
        <x-breadcrumb back="admin.categories.index" current="Category"></x-breadcrumb>

        <div class="row justify-content-center text-center g-3">
            <div class="col-12">
                <h1 class="mb-4">Категория: {{ $category->name }}</h1>
            </div>

            <div class="col-md-8">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8">
                        <img class="img-fluid" src="{{ Storage::url($category->image) }}" alt="">
                    </div>
                </div>
            </div>

            <div >
                <x-form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="col-12">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="las la-trash me-2"></i> Удалить
                    </button>
                </x-form>
            </div>
        </div>
    </x-container>
@endsection
