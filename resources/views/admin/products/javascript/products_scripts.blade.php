<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $(document).on('click', '#create_product_button', function (e) {
            e.preventDefault();

            let title = $('#title').val();
            let description = $('#description').val();
            let price = $('#price').val();
            let quantity = $('#quantity').val();
            let published = $('#published').prop('checked') ? '1' : '0';
            let categories = $('#categories').val();
            let images = $('#files').prop('files');


            let formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('price', price);
            formData.append('quantity', quantity);
            formData.append('published', published);

            if (categories) {
                categories.forEach(function (category) {
                    formData.append('categories[]', category);
                });
            }
            if (images) {
                for (let i = 0; i < images.length; i++) {
                    formData.append('images[]', images[i]);
                }
            }

            $.ajax({
                url: "{{route('admin.products.store')}}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.create_product_modal_form')[0].reset();
                    $('#create_product_modal').modal('hide');
                    $('.product-table').load("{{route('admin.products.index')}} .product-table");

                    if (response.status === 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (er) {
                    let error = er.responseJSON;
                    $('.errorMessageContainer').empty();
                    $.each(error.errors, function (index, value) {
                        $('.errorMessageContainer').append('<div class="ms-3 text-danger">' + value + '</div>');
                    });
                }
            });
        });
        $(document).on('click', '#delete_product_button', function (e) {
            e.preventDefault();
            let productId = $(this).data('id');

            Swal.fire({
                title: 'Вы уверены?',
                text: 'Вы действительно хотите удалить этот товар?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Да, удалить',
                cancelButtonText: "Отмена"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('admin.products.delete')}}",
                        method: 'POST',
                        data: {productId: productId},
                        success: function (response) {
                            if (response.status === 'success') {
                                $('.product-table').load("{{route('admin.products.index')}} .product-table");

                                toastr.success(response.message);
                            } else if (response.status === "error") {
                                toastr.error(response.message);
                            } else {
                                toastr.warning(response.message);
                            }
                        },
                        error: function () {
                            toastr.error('Произошла ошибка при удалении товара!');
                        }
                    });
                }
            });
        });
        $(document).on('click', '.update_product_form', function () {
            let productId = $(this).data('id');
            let title = $(this).data('title');
            let price = $(this).data('price');
            let quantity = $(this).data('quantity');
            let description = $(this).data('description');
            let published = $(this).data('published');
            let categories = $(this).data('categories');
            let images = $(this).data('images');

            $('#up_id').val(productId);
            $('#up_title').val(title);
            $('#up_price').val(price);
            $('#up_quantity').val(quantity);
            $('#up_description').val(description);
            $('#up_published').val(published);

            if (images) {
                let imageContainer = $('.imageContainer');
                let isImage = $('.isImage');
                isImage.addClass('fw-bold').text('Текущие картинки');
                imageContainer.empty();

                for (let i = 0; i < images.length; i++) {
                    let imagePath = images[i].imagePath;
                    let imageURL = "{{ \Illuminate\Support\Facades\Storage::url('')}}" + imagePath;
                    let imageElement = $('<img>').attr('src', imageURL).attr('alt', 'Product Image').addClass('img img-fluid');
                    imageContainer.append(imageElement);
                }
            }

            if(categories){
                let categoryContainer = $('.categoryContainer');
                let isCategory = $('.isCategory');
                isCategory.addClass('fw-bold').text('Текущие категории');

                categories.forEach(function (category){
                    categoryContainer.append($('li')).addClass('list-group-item').text(category.name);
                    // categoryContainer.append($('<li>').addClass('list-group-item').text(category.name));
                });
            }

        });



        $(document).on('click', '#updateProductButton', function () {
            console.log(123);
        });
    });
</script>
