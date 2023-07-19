@props(['checked' => false, 'title' => ''])

<label>
    {{ $title }}
    <input type="radio" {{ $checked ? 'checked' : '' }} {{ $attributes }}>
</label>
