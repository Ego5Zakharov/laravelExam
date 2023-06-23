@extends('layouts.base')
@section('content')

    <x-container>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-link class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_product_modal"
                data-bs-dismiss="modal">
            Create Product(Modal)
        </x-link>

        <div class="table-data">
            <x-table.table class="product-table table-bordered ">
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
                    @foreach($products as $product)
                        <x-table.row>
                            <x-table.col>{{$product->id}}</x-table.col>
                            <x-table.col>
                                <x-link
                                    href="{{route('admin.products.show',$product->id)}}"> {{$product->title}}</x-link>
                            </x-table.col>
                            <x-table.col>{{$product->description}}</x-table.col>
                            <x-table.col>{{$product->price}}</x-table.col>
                            <x-table.col>{{$product->quantity}}</x-table.col>
                            <x-table.col class="col-2">
                                Опубликовано: {{$product->published ? 'Да' : 'Нет'}}</x-table.col>

                            @if($product->images->count() > 0)
                                <x-table.col>
                                    <img class="img-fluid"
                                         src="{{Storage::url($product->images[0]->imagePath)}}"
                                         alt="">
                                </x-table.col>
                            @else
                                <x-table.col>
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="height: 200px;">
                                        <span class="text-muted">No Image</span>
                                    </div>
                                </x-table.col>
                            @endif
                            <x-table.col class="d-flex flex-column text-center">
                                <x-link class="update_product_form" data-id="{{$product->id}}"
                                        data-title="{{$product->title}}"
                                        data-description="{{$product->description}}"
                                        data-price="{{$product->price}}"
                                        data-quantity="{{$product->quantity}}"
                                        data-published="{{$product->published}}"
                                        data-categories="{{$product->categories}}"
                                        data-images="{{$product->images}}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateProductFormModal">
                                    Обновить
                                </x-link>


                                <x-link id="delete_product_button" data-id="{{$product->id}}">Удалить</x-link>
                            </x-table.col>

                        </x-table.row>

                    @endforeach

                </x-table.body>
            </x-table.table>
            <div class="mt-2">{{$products->links()}}</div>
        </div>
    </x-container>

@endsection

@include('admin.products.modal.add_product')
@include('admin.products.modal.update_product')


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('admin.products.javascript.products_scripts')
@endsection
