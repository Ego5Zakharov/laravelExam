@extends('layouts.base')

@section('content')
    <x-container>
        <div class="row mb-2 border-opacity-50 border-secondary">
            <div class="col-md-12 col-lg-12 d-flex">
                <div id="search-form" class="col-12 justify-content-center">
                    <x-input type="text" id="search" class=""></x-input>
                    <x-button class="border mt-2" id="search-button">Искать</x-button>
                    <x-button class="border mt-2" id="sort-asc-button">Сортировать по возрастанию</x-button>
                    <x-button class="border mt-2" id="sort-desc-button">Сортировать по убыванию</x-button>
                </div>
            </div>
        </div>


        <div class="row search-data mb-2">
            @foreach($products as $product)
                <div class="col-md-4 col-lg-4 gy-3">
                    <div class="card h-100 shadow border border-dark border-opacity-25">
                        <div class="cart-header">
                            <div class="card-img-bottom">
                                @if(count($product->images) > 0 && $product->images[0]->imagePath)
                                    <img class="card-img"
                                         src="{{Storage::url($product->images[0]->imagePath)}}"
                                         alt=""
                                         style="max-height: 150px">
                                @else
                                    <x-no-image>No Image</x-no-image>
                                @endif
                            </div>
                            <div class="card-title text-truncate"> <a href="{{route('product.show',$product->id)}}">{{$product->title}}</a></div>
                        </div>
                        <div class="cart-body">
                            <div class="card-text text-truncate">{{$product->description}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
            {!! $products->links() !!}
        </div>
    </x-container>

@endsection
@section('scripts')
    @include('search.javascript.searchProduct')
@endsection

