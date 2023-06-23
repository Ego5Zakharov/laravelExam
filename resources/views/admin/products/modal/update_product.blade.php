<!-- Модальное окно -->
<div class="modal fade" id="updateProductFormModal" tabindex="-1" aria-labelledby="updateModalLabel"
     aria-hidden="true">
    <x-form class="updateProductForm" enctype="multipart/form-data">
        <div class="modal-dialog">
            <input type="text" id="up_id" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Обновление данных товара</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Закрыть"></button>
                </div>

                <div class="errorMessageContainer"></div>
                <div class="modal-body">
                    <x-form-item>
                        <x-label for="up_title">Название</x-label>
                        <x-input id="up_title" name="title"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="up_description">Описание</x-label>
                        <x-textarea id="up_description" name="description"></x-textarea>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="up_price">Стоимость</x-label>
                        <x-input id="up_price" name="price"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="up_quantity">Количество на складе</x-label>
                        <x-input id="up_quantity" name="quantity"></x-input>
                    </x-form-item>


                    <x-form-item>
                        <x-label required>Категории
                            <select id="up_categories" name="categories[]" class="form-select" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </x-label>
                    </x-form-item>

                    <div class="">
                        <div class="isCategory col-12"></div>
                        <ul class="categoryContainer list-group">
                        </ul>
                    </div>

                    <x-form-item>
                        <x-label required>Картинки</x-label>
                        <x-input id="up_files" type="file" name="images[]" multiple></x-input>
                    </x-form-item>

                    <div class="">
                        <div class="isImage col-12"></div>
                        <div class="imageContainer"></div>
                    </div>
                    <x-form-item>
                        <x-label required>Опубликовано</x-label>
                        <x-input id="published" class="form-check-input" type="checkbox" name="published"
                                 value="1"></x-input>
                    </x-form-item>
                </div>

                <div class="modal-footer">
                    <x-button id="updateProductButton" type="button" data-bs-dismiss="modal">Обновить Товар</x-button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>

            </div>
        </div>
    </x-form>
</div>
