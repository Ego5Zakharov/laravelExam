<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function () {
        $('.add_product').on('click', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            console.log(name, price);


            $.ajax({
                url: '{{ route('admin.products.create') }}',
                method: 'POST',
                data: {name: name, price: price},
                success: function (res) {
                    if (res.status === 'success') {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

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
                        toastr["success"]("Product Created!", 'Success');
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append(`<span class="text-danger">${value}</span> <br>`);
                    });
                }
            });
        });
        // show product in update form
        $(document).on('click', '.update_product_form', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');


            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        // update product data
        $('.update_product').on('click', function (e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            console.log(up_name, up_price);

            $.ajax({
                url: '{{ route('admin.products.update') }}',
                method: 'POST',
                data: {up_id: up_id, up_name: up_name, up_price: up_price},
                success: function (res) {
                    if (res.status === 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
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
                        toastr["success"]("Product Updated!", 'Success');
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append(`<span class="text-danger">${value}</span> <br>`);
                    });
                }
            });
        });

        $('.delete_product').on('click', function (e) {
            e.preventDefault();
            let product_id = $(this).data('id');

            if (confirm('Are you sure to delete product?'))

                $.ajax({
                    url: '{{ route('admin.products.delete') }}',
                    method: 'POST',
                    data: {product_id: product_id},
                    success: function (res) {
                        if (res.status === 'success') {
                            $('.table').load(location.href + ' .table');
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
                            toastr["success"]("Product Deleted!", 'Success');
                        }
                    },
                });
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)

        });

        function product(page) {
            $.ajax({
                url: "/admin/products/paginate-data?page=" + page,
                success: function (res) {
                    $('.table-data').html(res);
                }
            });
        }

        $(document).on('keyup', '#search', function (e) {
            e.preventDefault();

            let search_string = $(this).val();

            $.ajax({
                url: '{{ route('admin.products.search') }}',
                method: 'GET',
                data: {search_string: search_string},
                success: function (res) {
                    $('.table-data').html(res.data);
                }
            });
        });



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
