<div class="row">
    <div class="col-6 border shadow bg-light">
        <p class="display-5">Отзывы</p>
    </div>
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
                Пока отзывов нет. Будьте первыми, поделитесь своим опытом использования товара.
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
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $feedback->created_at)->format('d.m.Y') }}
                    </div>
                </div>
                <div class="flex mt-1">
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
                               onclick="showFullComment('{{ $feedback->comment }}', {{ $feedback->id }})">
                                Показать комментарий полностью
                            </a>
                            <a class="collapseText text-decoration-none" href="#"
                               onclick="hideComment('{{ $feedback->comment }}', {{ $feedback->id }})"
                               style="display: none">
                                Скрыть комментарий
                            </a>
                        </div>
                    @else
                        <div>{{ $feedback->comment }}</div>
                    @endif
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <div class="me-5">
                        <form action="{{ route('feedback.like', $feedback->id) }}" method="POST" class="like-form">
                            @csrf
                            <div class="d-flex align-items-center">
                                <div class="me-2">Отзыв полезен?</div>
                                <x-button type="button" class="like-btn">
                                    <img width="25" height="25"
                                         src="https://img.icons8.com/ios/50/000000/facebook-like--v1.png"
                                         alt="facebook-like--v1"/>
                                </x-button>
                                <div class="like-count">{{ $feedback->like }}</div>
                            </div>
                        </form>
                    </div>

                    <div class="me-4">
                        <form action="{{ route('feedback.dislike', $feedback->id) }}" method="POST"
                              class="dislike-form">
                            @csrf
                            <div class="d-flex align-items-center">
                                <x-button type="button" class="dislike-btn">
                                    <img width="25" height="25"
                                         src="https://img.icons8.com/external-jumpicon-line-ayub-irawan/32/external-dislike-basic-ui-jumpicon-line-jumpicon-line-ayub-irawan.png"
                                         alt="external-dislike-basic-ui-jumpicon-line-jumpicon-line-ayub-irawan"/>
                                </x-button>
                                <div class="dislike-count">{{ $feedback->dislike }}</div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    @endif
</div>

<script>
    function showFullComment(comment, feedbackId) {
        const feedback = document.getElementById('feedback-' + feedbackId);
        const readMore = document.querySelector('.readMore');
        const collapseText = document.querySelector('.collapseText');

        if (feedback) {
            feedback.textContent = comment;
            readMore.style.display = 'none';
            collapseText.style.display = 'inline';
        }
        event.preventDefault();
    }

    function hideComment(comment, feedbackId) {
        const feedback = document.getElementById('feedback-' + feedbackId);
        const readMore = document.querySelector('.readMore');
        const collapseText = document.querySelector('.collapseText');

        if (feedback) {
            feedback.textContent = comment.slice(0, 100) + '...';
            readMore.style.display = 'inline';
            collapseText.style.display = 'none';
        }
        event.preventDefault();
    }
</script>
