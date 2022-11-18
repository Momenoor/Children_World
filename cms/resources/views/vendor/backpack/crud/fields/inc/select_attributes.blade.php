@php
    $field['attributes'] = $field['attributes'] ?? [];
    $field['attributes']['class'] = $field['attributes']['class'] ?? $default_class ?? 'form-select form-select-solid';
@endphp

@foreach ($field['attributes'] as $attribute => $value)
	@if (is_string($attribute))
    {{ $attribute }}="{{ $value }}"
    @endif
@endforeach
