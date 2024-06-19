@props([
    'type' => $type,
    'placeholder' => $placeholder,
    'name' => $name,
    'class' => '',
    'title' => $title,
    'isRequired' => "false"
])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $title }}
    @if ($isRequired == "true")
        <span class="text-danger">*</span>
    @endif
    </label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control {{ $class }}"
        name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
