@props([
    'type' => $type,
    'placeholder' => $placeholder,
    'class' => '',
    'name' => $name,
    'title' => $title,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control {{ $class }}"
        name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
