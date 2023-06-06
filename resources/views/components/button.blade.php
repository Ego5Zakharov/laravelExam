@props(['color' => '', 'size' => '','text_color'=>'primary', 'font'=>'bold'])

<button {{ $attributes->class([
    "btn btn-{$color}", ($size ? "btn-{$size}" : ''),
    "text-{$text_color}",
    "fw-{$font}"
])->merge([
    'type' => 'button',
]) }}>
    {{ $slot }}
</button>
