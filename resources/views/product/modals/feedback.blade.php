<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="display-6" id="exampleModalLabel">Оцените этот товар</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <x-form action="{{route('feedback.store',$product->id)}}" method="POST">
                    @csrf

                    <x-form-item>
                        <x-label class="form-label"><h3 class="display-7">Комментарий</h3></x-label>
                        <x-textarea class="mb-2" name="comment" placeholder="Комментарий"></x-textarea>
                    </x-form-item>

                    <x-form-item>
                        <x-label><h3 class="display-7">Оценка</h3></x-label>
                        <x-select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </x-select>
                    </x-form-item>

                    <x-form-item class="d-flex flex-column">
                        <label class="form-check-label" for="flexCheckDefault">
                            <h3  class="display-7">Мой комментарий будет виден всем</h3>
                        </label>
                        <input class="form-check-input" type="checkbox" name="visible" value="1" id="flexCheckDefault">
                    </x-form-item>

                    <x-button type="submit" class="border">Отправить</x-button>
                </x-form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>

        </div>
    </div>
</div>

