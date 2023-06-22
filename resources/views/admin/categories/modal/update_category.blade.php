<div class="modal fade" id="updateCategoryFormModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <x-form enctype="multipart/form-data" id="updateCategoryForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="display-6" id="exampleModalLabel">Обновление категории</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <div class="errorMessageContainer"></div>

                <input type="hidden" id="up_id">

                <div class="modal-body">
                    <x-form-item>
                        <x-label class="form-label"><h3 class="display-7">Название категории</h3></x-label>
                        <x-input class="mb-2" name="up_name" id="up_name"></x-input>
                    </x-form-item>

                    <x-form-item>
                        <x-label class="form-label"><h3 class="display-7">Выберите картинку</h3></x-label>
                        <x-input class="mb-2" name="up_image" id="up_image" type="file"></x-input>
                    </x-form-item>
                </div>

                <div class="modal-footer">
                    <x-button id="updateCategoryButton" type="button" data-bs-dismiss="modal">Обновить категорию</x-button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </x-form>
</div>
