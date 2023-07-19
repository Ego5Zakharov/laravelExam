<!-- Модальное окно -->
<div class="modal fade" id="create_product_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <x-form class="create_product_modal_form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Заголовок модального окна</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Закрыть"></button>
                </div>

                <div class="errorMessageContainer"></div>
                <div class="modal-body">
                    <x-form-item>
                        <x-label for="title">Название</x-label>
                        <x-input id="title" name="title"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="description">Описание</x-label>
                        <x-textarea id="description" name="description"></x-textarea>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="price">Стоимость</x-label>
                        <x-input id="price" name="price"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label for="quantity">Количество на складе</x-label>
                        <x-input id="quantity" name="quantity"></x-input>
                    </x-form-item>


                    <x-form-item>
                        <x-label required>Категории
                            <select id="categories" name="categories[]" class="form-select" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </x-label>
                    </x-form-item>

                    <x-form-item>
                        <x-label required>Картинки</x-label>
                        <x-input id="files" type="file" name="images[]" multiple></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label class="" required>Опубликовано</x-label>
                        <x-input id="published" class="form-check-input" type="checkbox" name="published" value="1"></x-input>
                    </x-form-item>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <x-button id="create_product_button" type="button" data-bs-toggle="modal" data-bs-target="#create_product_modal">
                        Создать Товар
                    </x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
