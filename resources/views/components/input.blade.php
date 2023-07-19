@props(['required'=>false])

<input {{$attributes->class([
    'form-control',
    $required ? $required:''
])->merge([
    'type'=>'text'
])}}>
{{$slot}}


