@extends('layouts.base')

@section('content')
    <x-container>

        <div class="row border mb-4">
            <div class="col-md-6">
                <div
                    class="text-center fw-bolder h2">{{(new \App\Support\Values\Number)->add($product->average_rating,2 ?? 0)??0 }}</div>
                <div class="text-center fw-bolder h2">{{$product->title}}</div>
                @if($images->count()>0)
                    <div class="mb-4">
                        <img id="main-image" src="{{ Storage::url($product->images[0]->imagePath) }}"
                             class="img-fluid img-thumbnail"
                             alt="Main Image">
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
                                             style="width: 100%; max-width: 100%"
                                             alt="Main Image"
                                             onclick="changeMainImage('{{ Storage::url($image->imagePath) }}')">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-6 border shadow bg-light"><p class="display-5">Отзывы</p></div>
            <div class="col-6 border shadow bg-light">
                <x-button type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <p class="display-5">
                        Оставить отзыв
                    </p>
                </x-button>
            </div>

            @if($feedbacks->count() === 0)
                <div class="col-12 border">
                    <h3 class="display-7 pt-3">
                        Пока отзывов нет.
                        Будьте первыми, поделитесь своим опытом использования товара.
                    </h3>
                </div>
            @else
                @foreach($feedbacks as $feedback)
                    <div class="col-12 border">

                        <div class="d-flex">
                            <div class="display-7 h6">
                                {{$feedback->user->name}}
                            </div>

                            <div class="ps-3 h6 opacity-50">
                                {{ \Carbon\Carbon::createFromDate($feedback->created_at)->format('d.m.Y') }}
                            </div>

                        </div>
                        <div>
                            @for($i = 1; $i <= $feedback->rating ; $i++)
                                <img class="mb-1" width="15" height="15"
                                     src="https://img.icons8.com/fluency/48/star.png" alt="star"/>
                            @endfor
                        </div>

                        <div class="d-flex flex-column">
                            @if(strlen($feedback->comment) > 100)
                                <div id="feedback-{{ $feedback->id }}">{{ substr($feedback->comment, 0, 100) }}...</div>

                                <div>
                                    <a class="readMore text-decoration-none" href="#"
                                       onclick="showFullComment({{$feedback->id}})">
                                        Показать комментарий полностью
                                    </a>
                                    <a class="collapseText text-decoration-none" href="#"
                                       onclick="hideComment({{$feedback->id}})"
                                       style="display: none">
                                        Скрыть комментарий
                                    </a>
                                </div>

                            @else
                                <div>{{ $feedback->comment }}</div>
                            @endif
                        </div>

                        <div class="mt-3 d-flex justify-content-end">

                            <div class="me-5 mt-1">Отзыв полезен?</div>

                            <div class="me-5">
                                <x-form action="{{route('feedback.like',$feedback->id)}}" method="POST">
                                    @csrf
                                    <div class=" d-flex justify-content-center align-items-center">
                                        <x-button type="submit">
                                            <img width="25" height="25"
                                                 src="https://img.icons8.com/ios/50/000000/facebook-like--v1.png"
                                                 alt="facebook-like--v1"/>
                                        </x-button>
                                        <div>{{$feedback->like}}</div>
                                    </div>
                                </x-form>
                            </div>

                            <div class="me-4">

                                    <x-form action="{{route('feedback.dislike',$feedback->id)}}" method="POST">
                                        <div class="d-flex align-items-center justify-content-center">
                                        @csrf
                                        <x-button type="submit">
                                            <img width="25" height="25"
                                                 src="https://img.icons8.com/external-jumpicon-line-ayub-irawan/32/external-dislike-basic-ui-jumpicon-line-jumpicon-line-ayub-irawan.png"
                                                 alt="external-dislike-basic-ui-jumpicon-line-jumpicon-line-ayub-irawan"/>
                                        </x-button>
                                        <div>{{$feedback->dislike}}</div>

                                    </x-form>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>

    </x-container>
    @include('product.modals.feedback')

@endsection

<script>
    function showFullComment(feedbackId) {
        const feedback = document.getElementById('feedback-' + feedbackId);

        const readMore = document.querySelector('.readMore');
        const collapseText = document.querySelector('.collapseText');

        if (feedback) {
            feedback.textContent = "{{$feedback->comment}}";
            readMore.style.display = 'none';
            collapseText.style.display = 'inline';
        }
    }

    function hideComment(feedbackId) {
        const feedback = document.getElementById('feedback-' + feedbackId);
        const readMore = document.querySelector('.readMore');
        const collapseText = document.querySelector('.collapseText');

        if (feedback) {
            feedback.textContent = "{{substr($feedback->comment,0,100)}}...";
            readMore.style.display = 'inline';
            collapseText.style.display = 'none';
        }
    }
</script>
