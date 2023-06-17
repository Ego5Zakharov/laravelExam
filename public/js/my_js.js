function changeMainImage(imageUrl) {
    // Изменяем главное изображение на выбранное с анимацией
    $('#main-image').fadeOut(200, function () {
        $(this).attr('src', imageUrl).fadeIn(200);
    });
}

