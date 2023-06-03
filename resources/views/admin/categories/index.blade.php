@extends('layouts.base')

@section('content')
    <x-container>
        <x-alert></x-alert>

        <x-link route="admin.categories.create">
            Create Category
        </x-link>

        <x-table.table class="table-bordered">

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

                            <a class="text-decoration-none" href="{{route('admin.categories.show',$category)}}">
                                {{$category->name}}
                            </a>

                        </x-table.col>
                        <x-table.col>
                            @if($category->image)
                                <img src="{{ Storage::url($category->image) }}" class="img-fluid" alt="">
                            @else
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif
                        </x-table.col>
                        <x-table.col>
                            <div>Actions</div>
                        </x-table.col>
                    </x-table.row>
                @endforeach
            </x-table.body>

        </x-table.table>
    </x-container>
@endsection
