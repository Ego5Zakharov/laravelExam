<div class="modal fade" id="addCategoryFormModal" tabindex="-1" aria-labelledby="addModalLabel"
     aria-hidden="true">
    <x-form enctype="multipart/form-data" id="addCategoryForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="display-6" id="exampleModalLabel">Создание категории</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Закрыть"></button>
                </div>

                <div class="errorMessageContainer"></div>

                <div class="modal-body">
                    <x-form-item>
                        <x-label class="form-label"><h3 class="display-7">Название категории</h3></x-label>
                        <x-input class="mb-2" name="name" id="name"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label class="form-label"><h3 class="display-7">Выберите картинку</h3></x-label>
                        <x-input class="mb-2" name="image" id="image" type="file"></x-input>
                    </x-form-item>

                    <x-button id="addCategoryButton" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryFormModal">
                        Создать категорию
                    </x-button>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>

            </div>
        </div>
    </x-form>
</div>


