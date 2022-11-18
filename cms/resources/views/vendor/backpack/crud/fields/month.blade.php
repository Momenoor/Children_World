{{-- html5 month input --}}
@include('crud::fields.inc.wrapper_start')
@include('crud::fields.label')
    @include('crud::fields.inc.translatable_icon')
    <input
        type="month"
        name="{{ $field['name'] }}"
        value="{{ old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '' }}"
        @include('crud::fields.inc.attributes')
        >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')
