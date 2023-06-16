@extends('layouts.base')

@section('content')
    <x-container>
        <x-form action="{{ route('delivery.store') }}" method="POST"
                class="d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class="row bg-light border">
                    @csrf
                    <div class="col-6">
                        <x-form-item class="mb-3">
                            <x-label for="first_name" class="form-label">Имя</x-label>
                            <x-input name="first_name" class="form-control" placeholder="Иван"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-6">
                        <x-form-item class="mb-3">
                            <x-label for="last_name" class="form-label">Фамилия</x-label>
                            <x-input name="last_name" class="form-control" placeholder="Иванов"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-4">
                        <x-form-item class="mb-3">
                            <x-label for="phone" class="form-label">Телефон</x-label>
                            <x-input name="phone" class="form-control" placeholder="+7 (865) 952-9449"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-8">
                        <x-form-item class="mb-3">
                            <x-label for="address" class="form-label">Адрес доставки</x-label>
                            <x-input name="address" class="form-control"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-7">
                        <x-form-item class="mb-3">
                            <x-label for="city" class="form-label">Город</x-label>
                            <x-input name="city" class="form-control"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-5">
                        <x-form-item class="mb-3">
                            <x-label for="country" class="form-label">Страна</x-label>
                            <x-input name="country" class="form-control"></x-input>
                        </x-form-item>
                    </div>

                    <div class="col-12">
                        <x-form-item class="mb-3">
                            <x-label for="notes" class="form-label">Примечания</x-label>
                            <x-textarea name="notes" class="form-control" rows="2"></x-textarea>
                        </x-form-item>
                    </div>
                </div>

                <x-button type="submit" class=" text-start border mt-1">Отправить</x-button>
            </div>
        </x-form>
    </x-container>
@endsection
