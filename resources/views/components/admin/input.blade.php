@props([
    'type' => $type,
    'placeholder' => $placeholder,
    'name' => $name,
    'class' => '',
    'title' => $title,
    'isRequired' => 'false',
    'value' => '{{ old($name) }}'
])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $title }}
        @if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <input type="{{ $type }}" id="{{ $name }}" class="{{ $class }}"
        name="{{ $name }}" placeholder="{{ $placeholder }}" @if ($isRequired == 'true') required @endif value="{{ $value }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
