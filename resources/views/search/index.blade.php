@extends('layouts.base')

@section('content')
    <x-container class="">
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <x-form class="col-6" action="{{ route('search.index') }}" method="GET">

                            <x-form-item>

                                <x-input name="search" id="name" value="{{ $search }}" placeholder="search"></x-input>

                            </x-form-item>

                            <x-form-item class="d-flex  ">

                                <div class="col-6">

                                    <div class="sort-options">

                                        <div class="sort-buttons">

                                            <div class="sort-button">
                                                <span class="">Сначала подороже</span>

                                                <x-radio name="sort" value="desc" :checked="$orderBy === 'desc'"/>

                                            </div>

                                            <div class="sort-button">

                                                <span>Сначала подешевле</span>

                                                <x-radio name="sort" value="asc" :checked="$orderBy === 'asc'"/>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </x-form-item>

                            <x-button class="border" type="submit">Search</x-button>
                        </x-form>
                    </div>
                </div>
            </div>


            <div class="row">
                @if(empty($products))
                    <div class="d-flex justify-content-center align-items-center">
                        Продукты не найдены!
                    </div>
                @else
                    @foreach($products as $product)
                        <div class="col-md-4 col-sm-6 g-sm-4">
                            <x-card class="card-hover">

                                <x-card-header>
                                    @if(count($product->images) > 0 && $product->images[0]->imagePath)
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img class="img-thumbnail" style="height: 350px;width:350px; "
                                                 src="{{Storage::url($product->images[0]->imagePath)}}"
                                                 alt="">
                                        </div>
                                    @else
                                        <x-no-image>No Image</x-no-image>
                                    @endif
                                    <x-card-title class="text-center"><x-link href="{{route('product.show',$product)}} }}">{{$product->title}}</x-link></x-card-title>
                                </x-card-header>

                                <x-card-body>
                                    <x-card-text>{{$product->price}}</x-card-text>
                                </x-card-body>

                                <div class="card-buttons">
                                    @if(Auth::check())
                                        <x-form action="{{route('cart.add',$product->id)}}" method="POST">
                                            @csrf
                                            <x-button type="submit">Добавить в корзину</x-button>
                                        </x-form>
                                    @else
                                        <x-form action="{{route('cart.addSession',$product->id)}}" method="POST">
                                            @csrf
                                            <x-button type="submit">Добавить в корзину(Session)</x-button>
                                        </x-form>
                                    @endif

                                </div>
                            </x-card>
                        </div>
                    @endforeach
            </div>

            <div class="mt-2">
                {{$products->links()}}
            </div>


        @endif

    </x-container>
    <style>
        .card-hover:hover .card-buttons {
            display: flex;
        }

        .card-buttons {
            display: none;
            margin-top: 10px;
        }
    </style>
@endsection
