@extends('layouts.base')

@section('content')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">Laravel 8 Ajax CRUD</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add
                    Product</a>

                <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search">

                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <th>{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href=""
                                       class="btn btn-success update_product_form"
                                       data-bs-toggle="modal"
                                       data-bs-target="#updateModal"
                                       data-id="{{$product->id}}"
                                       data-name="{{$product->name}}"
                                       data-price="{{$product->price}}"
                                    >
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a href=""
                                       class="btn btn-danger delete_product"
                                       data-id="{{$product->id}}"
                                    >
                                        <i class="las la-times">
                                        </i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

    {!! Toastr::message() !!}
    @include('admin.products.modals.update_product_modal');
    @include('admin.products.modals.add_product_modal')
    @include('admin.products.scripts.script')

@endsection


@section('scripts')

@endsection
