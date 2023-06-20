@extends('layouts.base')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <x-container>

        <div class="row border mb-4">
            <div class="col-md-6">
                <div
                    class="text-center fw-bolder h2">{{ (new \App\Support\Values\Number)->add($product->average_rating ?? 0, 2) ?? 0 }}</div>
                <div class="text-center fw-bolder h2">{{$product->title}}</div>
                @if($images->count()>0)
                    <div class="mb-4">
                        <img id="main-image" src="{{ Storage::url($product->images[0]->imagePath) }}"
                             class="img-fluid img-thumbnail" alt="Main Image">
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                        <span class="text-muted">No image</span>
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <div class="text-start">

                    <div class="mb-3 mt-5">
                        <b>Описание:</b>
                    </div>

                    <div class="mb-3">
                        {{$product->description}}
                    </div>

                    <div class="mb-3">
                        <b>Цена:</b> {{$product->price}}
                    </div>

                    <div class="mb-3">
                        <b>Количество на складе:</b> {{ $product->quantity ? $product->quantity : 'Нет на складе!' }}
                    </div>

                    @if(Auth::check())
                        <x-form action="{{route('cart.add',$product->id)}}" method="POST">
                            @csrf
                            <x-button type="submit">Добавить в корзину</x-button>
                        </x-form>

                    @else
                        <x-form action="{{route('cart.addSession',$product->id)}}" method="POST">
                            @csrf
                            <x-button type="submit">Добавить в корзину(session)</x-button>
                        </x-form>
                    @endif

                </div>
            </div>
        </div>

        @if($images->count()>0)
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        @foreach ($images as $key => $image)
                            <div class="col-4 mb-3">
                                <div class="p-1">
                                    <label class="form-check">
                                        <img src="{{ Storage::url($image->imagePath) }}" class="img-thumbnail"
                                             style="width: 100%; max-width: 100%" alt="Main Image"
                                             onclick="changeMainImage('{{ Storage::url($image->imagePath) }}')">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @include('product.feedbacks')

    </x-container>
    @include('product.modals.feedback')
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function () {
        $('.like-btn').click(function () {
            const button = $(this);
            const form = button.closest('.like-form');
            const url = form.attr('action');

            if (!button.hasClass('disabled')) {
                button.addClass('disabled');
                const dislikeButton = form.find('.dislike-btn');
                dislikeButton.addClass('disabled');

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function (response) {
                        const likeCount = response.like_count;
                        const dislikeCount = response.dislike_count;
                        const message = response.message;

                        if (message === "Лайк уже поставлен") {
                            toastr.warning(message);
                            return;
                        } else {
                            toastr.success(message);
                        }

                        form.find('.like-count').text(likeCount);
                        form.find('.dislike-count').text(dislikeCount);
                    },
                    error: function (xhr, status, error) {
                        // Обработка ошибки, если необходимо
                    }
                });
            }
        });

        $('.dislike-btn').click(function () {
            const button = $(this);
            const form = button.closest('.dislike-form');
            const url = form.attr('action');

            if (!button.hasClass('disabled')) {
                button.addClass('disabled');
                const likeButton = form.find('.like-btn');
                likeButton.addClass('disabled');

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function (response) {
                        const likeCount = response.like_count;
                        const dislikeCount = response.dislike_count;
                        const message = response.message;

                        if (message === "Дизлайк уже поставлен") {
                            toastr.warning(message);
                            return;
                        } else {
                            toastr.success(message);
                        }

                        form.find('.like-count').text(likeCount);
                        form.find('.dislike-count').text(dislikeCount);
                    },
                    error: function (xhr, status, error) {
                        // Обработка ошибки, если необходимо
                    }
                });
            }
        });
    });
</script>
