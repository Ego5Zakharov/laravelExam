<div {{$attributes->merge(['class'=>'container mt-5 mb-5'])}}>
    <x-alert></x-alert>
    <x-errors></x-errors>
    {{$slot}}
</div>
