<!-- Модальное окно -->
<div class="modal fade" id="updateProductFormModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <x-form class="updateProductForm">
        <div class="modal-dialog">
            <input type="text" id="up_productId" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Обновление данных товара</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
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
                            <x-select id="up_categories" name="categories[]" class="form-select" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}
                                    data-categoryId ={{$category->id}}
                                    ">{{$category->name}}</option>
                                @endforeach
                            </x-select>
                        </x-label>
                    </x-form-item>

                    <div class="categoryContainer">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    {{$category->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <x-form-item>
                        <x-label required>Картинки</x-label>
                        <x-input id="up_images" type="file" name="images" multiple></x-input>
                    </x-form-item>

                    <div class="imageContainer">
                        <ul class="list-group">
                        </ul>
                    </div>

                    <x-form-item>
                        <x-label required>Опубликовано</x-label>
                        <x-input id="up_published" class="form-check-input" type="checkbox" name="published"
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
