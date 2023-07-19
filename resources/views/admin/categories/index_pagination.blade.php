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
                    <x-link href="{{ route('admin.categories.show', $category) }}">
                        {{ $category->name }}
                    </x-link>
                </x-table.col>

                <x-table.col>
                    @if($category->image)
                        <img src="{{ Storage::url($category->image) }}" class="img-fluid w-50" alt="">
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                            <span class="text-muted">No Image</span>
                        </div>
                    @endif
                </x-table.col>

                <x-table.col class="text-center">
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
{!!$categories->links() !!}

