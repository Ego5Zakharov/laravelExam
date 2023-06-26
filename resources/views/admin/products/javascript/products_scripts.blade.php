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
                error: function (xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    let errors = xhr.responseJSON.errors;
                    let errorContainer = $('.errorMessageContainer');
                    errorContainer.empty();

                    if (errorMessage) {
                        let alert = $('<div>').addClass('alert alert-danger').text(errorMessage);
                        errorContainer.append(alert);
                    }

                    if (errors) {
                        $.each(errors, function (key, value) {
                            let alert = $('<div>').addClass('alert alert-danger').text(value);
                            errorContainer.append(alert);
                        });
                    }
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

            $('#up_productId').val(productId);
            $('#up_title').val(title);
            $('#up_price').val(price);
            $('#up_quantity').val(quantity);
            $('#up_description').val(description);
            $('#up_published').prop('checked', published);

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
                    let deleteButton = $('<button>').addClass('btn btn-danger deleteImageButton')
                        .attr('data-product-id', productId)
                        .attr('data-image-id', images[i].id)
                        .text('Удалить');
                    imageContainer.append(deleteButton);
                }
            }

            if (categories) {
                let categoryContainer = $('.categoryContainer');
                let isCategory = $('.isCategory');
                isCategory.addClass('fw-bold').text('Текущие категории');
                categoryContainer.empty();

                categories.forEach(function (category) {
                    let listItem = $('<li>').addClass('list-group-item').text(category.name);
                    let deleteButton = $('<button>').addClass('btn btn-danger deleteCategoryButton')
                        .attr('data-product-id', productId)
                        .attr('data-category-id', category.id)
                        .text('Удалить');

                    listItem.append(deleteButton);
                    categoryContainer.append(listItem);
                });
            }
        });


        $(document).on('click', '#updateProductButton', function (e) {
            let up_productId = $('#up_productId').val();
            let up_title = $('#up_title').val();
            let up_description = $('#up_description').val();
            let up_price = $('#up_price').val();
            let up_quantity = $('#up_quantity').val();
            let up_published = $('#up_published').prop('checked') ? '1' : '0';
            let categories = $('#up_categories').val();

            let images = document.getElementById('up_images').files;

            let formData = new FormData();

            formData.append('productId', up_productId);
            formData.append('title', up_title);
            formData.append('description', up_description);
            formData.append('price', up_price);
            formData.append('quantity', up_quantity);
            formData.append('published', up_published);
            formData.append('_method', 'POST');

            if (images) {
                for (let i = 0; i < images.length; i++) {
                    formData.append('images[]', images[i]);
                }
            }
            console.log(categories);

            if (categories) {
                categories.forEach(function (category) {
                    let trimmedCategory = category.trim(); // Удаляем лишние пробелы и символы новой строки
                    let categoryId = trimmedCategory.match(/\d+/); // Извлекаем числовое значение из строки
                    if (categoryId) {
                        formData.append('categories[]', categoryId[0]);
                    }
                });
            }

            console.log(categories);

            formData.getAll('categories');
            $.ajax({
                url: "{{ route('admin.products.update') }}",
                data: formData,
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status === "success") {
                        $('.product-table').load("{{route('admin.products.index')}} .product-table");
                        toastr.success(response.message);
                        $('.errorMessageContainer').empty();
                    }
                },
                error: function (xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    let errors = xhr.responseJSON.errors;
                    let errorContainer = $('.errorMessageContainer');
                    errorContainer.empty();

                    if (errorMessage) {
                        let alert = $('<div>').addClass('alert alert-danger').text(errorMessage);
                        errorContainer.append(alert);
                    }

                    if (errors) {
                        $.each(errors, function (key, value) {
                            let alert = $('<div>').addClass('alert alert-danger').text(value);
                            errorContainer.append(alert);
                        });
                    }
                }
            });
        });

        $(document).on('click', '.deleteCategoryButton', function (e) {
            e.preventDefault();
            let categoryId = $(this).data('category-id');
            let productId = $(this).data('product-id');

            $.ajax({
                url: "{{route('admin.products.categoryDelete')}}",
                method: 'POST',
                data: {categoryId: categoryId, productId: productId},
                success: function (response) {
                    if (response.status === 'success') {
                        $(this).closest('li.list-group-item').remove();
                        toastr.success(response.message);
                    } else {
                        toastr.error("Ошибка удаления");
                    }
                }.bind(this),
                error: function (xhr, status, error) {
                    toastr.error("Ошибка при выполнении запроса");
                }
            });
        });

        $(document).on('click', '.deleteImageButton', function (e) {
            e.preventDefault();

            let imageId = $(this).data('image-id');
            let productId = $(this).data('product-id');
            let imageContainerId = '#imageContainer-' + imageId;
            $.ajax({
                url: "{{ route('admin.products.imageDelete') }}",
                method: 'POST',
                data: {imageId: imageId, productId: productId},
                success: function (response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.error("Ошибка удаления");
                    }
                },
                error: function (xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    let errors = xhr.responseJSON.errors;
                    let errorContainer = $('.errorMessageContainer');
                    errorContainer.empty();

                    if (errorMessage) {
                        let alert = $('<div>').addClass('alert alert-danger').text(errorMessage);
                        errorContainer.append(alert);
                    }

                    if (errors) {
                        $.each(errors, function (key, value) {
                            let alert = $('<div>').addClass('alert alert-danger').text(value);
                            errorContainer.append(alert);
                        });
                    }
                }
            });
        });



    });
</script>
