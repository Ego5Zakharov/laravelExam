@php
    $back = $attributes->get('back');
    $current = $attributes->get('current');
@endphp

<nav {{$attributes}}>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route($back)}}">Назад</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$current}}</li>
    </ol>
</nav>
