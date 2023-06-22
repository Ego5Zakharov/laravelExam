@extends('layouts.base')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-container>
        <x-button type="button" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryFormModal">
            Создать категорию
        </x-button>

        <x-input name="search" id="search" class="mb-3"></x-input>
        <div class="table-data">
            <x-table.table class="category-table table-bordered">
                <x-table.header>
                    <x-table.col>#</x-table.col>
                    <x-table.col>Name</x-table.col>
                    <x-table.col>Image</x-table.col>
                    <x-table.col>Actions</x-table.col>
                </x-table.header>

                <x-table.body>
                    @foreach($categories as $category)
                        <x-table.row>
                            <x-table.col>{{ $category->id }}</x-table.col>

                            <x-table.col>
                                <x-link class="show-category" data-id="{{$category->id}}" href="#">
                                    {{ $category->name }}
                                </x-link>
                            </x-table.col>

                            <x-table.col>
                                @if($category->image)
                                    <img src="{{ Storage::url($category->image) }}" class="img-fluid w-50" alt="">
                                @else
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="height: 200px;">
                                        <span class="text-muted">No Image</span>
                                    </div>
                                @endif
                            </x-table.col>

                            <x-table.col class="text-center mb-2 ">
                                <x-link
                                    class="delete_category"
                                    data-id="{{$category->id}}">
                                    Удалить
                                </x-link>

                                <x-link
                                    class="update_category_form"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateCategoryFormModal"
                                    data-id="{{$category->id}}"
                                    data-name="{{$category->name}}"
                                    data-image="{{Storage::url($category->image)}}">
                                    Изменить
                                </x-link>

                            </x-table.col>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table.table>
            {!!  $categories->links() !!}
        </div>
    </x-container>

@endsection

@include('admin.categories.modal.add_category')
@include('admin.categories.modal.update_category')


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('admin.categories.javascript.category')

@endsection
