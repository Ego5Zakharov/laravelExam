@extends('layouts.base')

@section('content')

    <div class="container pt-5">
        <x-alert></x-alert>
        <a class="btn btn-warning mb-2" href="{{ route('admin.products.create') }}">Create Product</a>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 g-4">
                    <div class="card">
                        <div class="card-header">
                            @if($product->images->count() > 0)
                                <img src="{{ Storage::url($product->images[0]->imagePath) }}" class="card-img-top img-fluid card-img" alt="">
                            @else
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif

                            <p class="card-text border-success">{{ $product->title }}</p>
                        </div>

                        <div class="card-body">
                            <p class="card-text">{{ $product->description }}</p>
                        </div>

                        <div class="card-footer">
                            <p class="card-text">Price: {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
