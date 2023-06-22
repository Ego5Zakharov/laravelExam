<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $(document).on('click', '#addCategoryButton', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let image = $('#image')[0].files[0];
            console.log(name + image);

            let formData = new FormData();

            formData.append('name', name);
            formData.append('image', image);

            $.ajax({
                url: "{{ route('admin.categories.store') }}",
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        console.log(response.status);
                        $('#addCategoryFormModal').modal('hide');
                        $('#addCategoryForm')[0].reset();
                        $('.category-table').load(location.href + ' .category-table');
                        toastr.success(response.message);
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $('.errorMessageContainer').empty();
                    $.each(error.errors, function (index, value) {
                        $('.errorMessageContainer').append('<span class="ms-3 text-danger">' + value + '</span>' + '</br>')
                    });
                }
            });

        });

        $(document).on('click', '.update_category_form', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let image = $(this).data('image');

            $('#up_id').val(id);
            $('#up_name').val(name);
            // Set the image source using the `image` variable
            $('#up_image').attr('src', image);
        });

        $(document).on('click', '#updateCategoryButton', function () {
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_image = $('#up_image')[0].files[0];

            let formData = new FormData();
            formData.append('up_id', up_id);
            formData.append('up_name', up_name);
            formData.append('up_image', up_image);
            formData.append('_method', 'POST');

            $.ajax({
                url: "{{ route('admin.categories.update') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        $('#updateCategoryFormModal').modal('hide');
                        $('#updateCategoryForm')[0].reset();
                        $('.category-table').load(location.href + ' .category-table');
                        toastr.success(response.message);
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $('.errorMessageContainer').empty();
                    $.each(error.errors, function (index, value) {
                        $('.errorMessageContainer').append('<span class="ms-3 text-danger">' + value + '</span><br>');
                    });
                }
            });
        });

        $(document).on('click', '.delete_category', function (e) {
            e.preventDefault();
            let category_id = $(this).data('id');

            Swal.fire({
                title: 'Вы уверены?',
                text: 'Вы действительно хотите удалить эту категорию?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Да, удалить',
                cancelButtonText: 'Отмена'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Если пользователь подтвердил удаление, выполните AJAX-запрос
                    $.ajax({
                        url: "{{ route('admin.categories.delete') }}",
                        method: 'POST',
                        data: {category_id: category_id},
                        success: function (response) {
                            $('.category-table').load(location.href + ' .category-table');

                            if (response.status === 'success') {
                                toastr.success(response.message);
                            } else if (response.status === 'error') {
                                toastr.error(response.message);
                            } else {
                                toastr.warning(response.message);
                            }
                        },
                        error: function (error) {
                            toastr.error("Произошла ошибка при удалении категории.");
                        }
                    });
                }
            });
        });


        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            paginate(page);
        });

        function paginate(page) {
            $.ajax({
                url: "/admin/categories/pagination/paginate-data?page=" + page,
                success: function (response) {
                    $('.table-data').html(response);
                    console.log('Clicked page: ' + page);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).on('keyup', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{route('admin.categories.search')}}",
                method: 'GET',
                data: {search_string: search_string},
                success: function (response) {
                    $('.table-data').html(response);

                    if (response.status === 'nothing_found') {
                    $('.table-data').html('<div class="display-1 text-center m-5">Ничего не найдено!</div>')
                    }
                }
            });
        });
    });
</script>
