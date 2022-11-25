{{-- students_rate_table_field field --}}
@php
    $field['value'] = old_empty_or_null($field['name'], '') ?? ($field['value'] ?? ($field['default'] ?? ''));
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <input type="text"
        name="{{ $field['name'] }}"
        data-init-function="bpFieldInitDummyFieldElement"
        value="{{ $field['value'] }}"
        @include('crud::fields.inc.attributes')>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

{{-- CUSTOM CSS --}}
@push('crud_fields_styles')
    {{-- How to load a CSS file? --}}
    @loadOnce('students_rate_tableFieldStyle.css')

    {{-- How to add some CSS? --}}
    @loadOnce('students_rate_table_field_style')
        <style>
            .students_rate_table_field_class {
                display: none;
            }
        </style>
    @endLoadOnce
@endpush

{{-- CUSTOM JS --}}
@push('crud_fields_scripts')
    {{-- How to load a JS file? --}}
    @loadOnce('students_rate_tableFieldScript.js')

    {{-- How to add some JS to the field? --}}
    @loadOnce('bpFieldInitDummyFieldElement')
    <script>
        function bpFieldInitDummyFieldElement(element) {
            // this function will be called on pageload, because it's
            // present as data-init-function in the HTML above; the
            // element parameter here will be the jQuery wrapped
            // element where init function was defined
            console.log(element.val());
        }
    </script>
    @endLoadOnce
@endpush
