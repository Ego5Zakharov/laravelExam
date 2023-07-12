<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];

        paginate(page);
    });

    function paginate(page) {
        $.ajax({
            url: "/search/pagination/paginate-data?page=" + page,
            success: function (response) {
                $('.search-data').html(response);
                console.log('Clicked page: ' + page);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $(document).ready(function () {
        $(document).on('click', '#search-button', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{route('search.search')}}",
                method: 'GET',
                data: {search_string: search_string},
                success: function (response) {
                    if (response.status === 'nothing_found') {
                        $('.search-data').html('<div class="display-1 text-center m-5">Ничего не найдено!</div>');
                    } else {
                        $('.search-data').html(response.view);
                    }
                }
            });
        });

        $(document).on('click', '#sort-asc-button', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{route('search.sortByAsc')}}",
                method: 'GET',
                data: {search_string: search_string, sort: 'asc'},
                success: function (response) {
                    if (response.status === 'nothing_found') {
                        $('.search-data').html('<div class="display-1 text-center m-5">Ничего не найдено!</div>');
                    } else {
                        $('.search-data').html(response);
                    }
                }
            });
        });

        $(document).on('click', '#sort-desc-button', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{route('search.sortByDesc')}}",
                method: 'GET',
                data: {search_string: search_string, sort: 'desc'},
                success: function (response) {
                    if (response.status === 'nothing_found') {
                        $('.search-data').html('<div class="display-1 text-center m-5">Ничего не найдено!</div>');
                    } else {
                        $('.search-data').html(response);
                    }
                }
            });
        });
    });


</script>
