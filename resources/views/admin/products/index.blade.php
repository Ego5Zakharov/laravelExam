@extends('layouts.base')

@section('content')

    <x-container>
        <x-alert></x-alert>

        <x-link route="admin.products.create">
            Create Product
        </x-link>


        <x-table.table class="table-bordered ">

            <x-table.header>
                <x-table.col>#</x-table.col>
                <x-table.col>Title</x-table.col>
                <x-table.col>Description</x-table.col>
                <x-table.col>Price</x-table.col>
                <x-table.col>IsPublished</x-table.col>
                <x-table.col>Image</x-table.col>
                <x-table.col>Actions</x-table.col>
            </x-table.header>

            <x-table.body>
                @foreach($products as $product)
                    <x-table.row>
                        <x-table.col>{{$product->id}}</x-table.col>
                        <x-table.col>{{$product->title}}</x-table.col>
                        <x-table.col>{{$product->description}}</x-table.col>
                        <x-table.col>{{$product->price}}</x-table.col>
                        @if($product->published)
                            <x-table.col>{{__('Yes')}}</x-table.col>
                        @else
                            <x-table.col>{{__('No')}}</x-table.col>
                        @endif
                        @if($product->images->count() > 0)
                            <x-table.col>
                                <img class="img-fluid"
                                     src="{{Storage::url($product->images[0]->imagePath)}}"
                                     alt="">
                            </x-table.col>
                        @else
                            <x-table.col>
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            </x-table.col>
                        @endif
                        <x-table.col>
                            <div class="">1</div>
                            <div>1</div>
                            <div>1</div>
                        </x-table.col>


                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table.table>
    </x-container>

@endsection
