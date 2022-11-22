{{-- html5 date input --}}

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')
    <p class="font-weight-bold">{{$field['value']}} <a class="float-right" href="{{route('user.edit',$crud->entry->user)}}">{{trans('backpack::crud.edit')}}</a></p>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')
