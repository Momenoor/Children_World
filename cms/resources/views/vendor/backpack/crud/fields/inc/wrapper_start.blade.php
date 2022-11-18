@php
	$field['wrapper'] = $field['wrapper'] ?? $field['wrapperAttributes'] ?? [];

    // each wrapper attribute can be a callback or a string
    // for those that are callbacks, run the callbacks to get the final string to use
    foreach($field['wrapper'] as $attributeKey => $value) {
        $field['wrapper'][$attributeKey] = !is_string($value) && $value instanceof \Closure ? $value($crud, $field, $entry ?? null) : $value ?? '';
    }


	$field['wrapper']['class'] = $field['wrapper']['class'] ?? "form-group col-sm-12 mb-5";
	$field['wrapper']['element'] = $field['wrapper']['element'] ?? 'div';
	$field['wrapper']['bp-field-wrapper'] = 'true';
	$field['wrapper']['bp-field-name'] = square_brackets_to_dots(implode(',', (array)$field['name']));
	$field['wrapper']['bp-field-type'] = $field['type'];
@endphp

<{{ $field['wrapper']['element'] }}
	@foreach($field['wrapper'] as $attribute => $value)
	    {{ $attribute }}="{{ $value }}"
	@endforeach
>
