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
    @include('admin.products.scripts.add_product')

@endsection


@section('scripts')

@endsection



-git status - статус всех файлов на то, были ли они добавлены в гит для последующего коммита

-git commit - инициализация гита в проекте

-git add * - добавление всех файлов в контейнер гита

-git commit -m "сообщение" - подготовка файлов контейнера перед отправкой + добавление сообщения

-git remote add "название" "путь до репозитория"

пример: git remote add github https://github.com/Ego5Zakharov/laravelExam.git
после этого нужно сделать push, чтобы все данные появились в репозитории

-git push -u "название" "название ветки" - отправление данных в репозиторий

-git config credential.username "Ego5Zakharov" -- авторизация

Чтобы создать новую ветвь, нужно зайти именно на гитхаб! // она будет изначально идти от ветви master

-git branch - сколько веток на локальной машине

-git fetch - вытягивание всех веток из репозитория

-git branch -r - сколько веток в репозитории

-git checkout -b "(название на локалке)" "определенная ветка(путь)" - добавление ветви на локальную машину
пример: git checkout -b develop github/develop

-git checkout "название ветки" - перемещение между ветвями


-git clone https://github.com/Ego5Zakharov/laravelExam.git "название папки которая будет создана там, где вы находились в терминале"
после того как мы склонировали проект, чтобы подключить все зависимости нужно написать
-composer install
-npm install
а также при помощи env.example создать свой файл .env



