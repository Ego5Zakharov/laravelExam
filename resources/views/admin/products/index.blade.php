@extends('layouts.base')

@section('content')

    <x-container>

        <x-link href="{{route('admin.products.create')}}">
            Create Product
        </x-link>

        <x-table.table class="table-bordered ">

            <x-table.header>
                <x-table.col>#</x-table.col>
                <x-table.col>Title</x-table.col>
                <x-table.col>Description</x-table.col>
                <x-table.col>Price</x-table.col>
                <x-table.col>Quantity</x-table.col>
                <x-table.col>IsPublished</x-table.col>
                <x-table.col>Image</x-table.col>
                <x-table.col>Actions</x-table.col>
            </x-table.header>

            <x-table.body>
                <div class="mt-2">{{$products->links()}}</div>
                @foreach($products as $product)
                    <x-table.row>
                        <x-table.col>{{$product->id}}</x-table.col>
                        <x-table.col>
                            <x-link href="{{route('admin.products.show',$product->id)}}"> {{$product->title}}</x-link>
                        </x-table.col>
                        <x-table.col>{{$product->description}}</x-table.col>
                        <x-table.col>{{$product->price}}</x-table.col>
                        <x-table.col>{{$product->quantity}}</x-table.col>
                        <x-table.col class="col-2">Опубликовано: {{$product->published ? 'Да' : 'Нет'}}</x-table.col>

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
                        <x-table.col class="d-flex flex-column text-center">

                            <x-form action="{{route('admin.products.delete',$product)}}" method="POST">
                                @csrf
                                <x-button type="submit">Удалить</x-button>
                            </x-form>
                            <x-link href="{{route('admin.products.edit',$product)}}">Изменить</x-link>
                        </x-table.col>

                    </x-table.row>

                @endforeach

            </x-table.body>
        </x-table.table>
        <div class="mt-2">{{$products->links()}}</div>

    </x-container>

@endsection
