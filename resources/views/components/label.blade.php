@props(['required'=>false])

<label {{$attributes->merge([
    ($required ? $required : '')
])}}>
    {{$slot}}
</label>
