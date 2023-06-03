@props(['required'=>false])

<div {{
    $attributes
->class('form-control',$required ? $required: '')
->merge(['type'=>'text'
])
}}>
    {{$slot}}

</div>
