@extends('layouts.base')

@section('content')
    <x-container>
        <x-table.table class="table-bordered">

            {{--      col - колонка      --}}
            {{--      row - ряд          --}}

            <x-table.header>
                <x-table.col>#</x-table.col>
                <x-table.col>Name</x-table.col>
                <x-table.col>Management</x-table.col>
            </x-table.header>

            <x-table.body>

                <x-table.row>
                    <x-table.col>1</x-table.col>
                    <x-table.col>Users</x-table.col>
                    <x-table.col><a class="text-decoration-none" href="{{route('admin.users.index')}}">Users Page</a></x-table.col>
                </x-table.row>

                <x-table.row>
                    <x-table.col>2</x-table.col>
                    <x-table.col>Products</x-table.col>
                    <x-table.col><a class="text-decoration-none" href="{{route('admin.products.index')}}">Products Page</a></x-table.col>
                </x-table.row>

                <x-table.row>
                    <x-table.col>3</x-table.col>
                    <x-table.col>Categories</x-table.col>
                    <x-table.col><a class="text-decoration-none" href="{{route('admin.categories.index')}}">Categories Page</a></x-table.col>
                </x-table.row>

            </x-table.body>

        </x-table.table>
    </x-container>
@endsection
