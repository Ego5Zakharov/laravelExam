{{--@extends('layouts.base')--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
{{--header--}}
<header class="px-2 border-b">
    <a class="px-2 uppercase font-bold text-purple-800" href="#">Egor</a>
    <nav>
        <ul class="text-gray-300 font-semibold">
            <li><a class="inline-block py-3 px-2" href="">Home</a></li>
            <li><a class="inline-block py-3 px-2" href="">About</a></li>
            <li><a class="inline-block py-3 px-2" href="">Contact</a></li>
        </ul>
    </nav>
</header>

{{--  breadcrumbs--}}
<main>
    <div>
        <div class="py-4 overflow-y-auto whitespace-nowrap">
            <a class="text-gray-600" href="#">Home</a>
            <span class="mx-2 text-gray-500">&gt;</span>
            <a href="#">News</a>
            <span class="mx-2 text-gray-500">&gt;</span>
            <a href="#">Tech</a>
        </div>
    </div>
    <footer></footer>
</main>

</body>
{{--@section('content')--}}
{{--    <x-container>--}}

{{--    </x-container>--}}
{{--@endsection--}}

