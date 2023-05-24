<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Components</title>
    <!--noinspection HtmlUnknownTarget -->

    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<div class="">

    <div class="d-flex flex-column text-decoration-center">

        <header>

            @include('includes.header')

        </header>

    </div>

    <div>

        @yield('content')

    </div>

    <div>

        @include('includes.footer')

    </div>

</div>

{{-- Нужно вставлять файлы до @yield('scripts') --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>

@yield('scripts')

</body>
</html>
