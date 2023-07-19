function changeMainImage(imageUrl) {
    // Изменяем главное изображение на выбранное с анимацией
    $('#main-image').fadeOut(200, function () {
        $(this).attr('src', imageUrl).fadeIn(200);
    });
}

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

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("Inconceivable!");
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
