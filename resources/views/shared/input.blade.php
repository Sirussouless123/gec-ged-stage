@php
    $class ??= null;
    $label ??= '';
    $name ??= strtolower($label);
    $type ??= 'text';
    $value ??= '';
    $placeholder ??= '';
@endphp
<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }} " name="{{ $name }}" value="{{ $value }} "
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    </div>
@enderror
