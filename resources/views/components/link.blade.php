@php
    // Получаем значение атрибута "route"
    $route = $attributes->get('route');
@endphp

<div {{$attributes}}>
    <a {{$attributes->merge(['class'=>'text-decoration-none'])}}
       href="{{ route($route) }}">
        {{ $slot }}
    </a>
</div>
