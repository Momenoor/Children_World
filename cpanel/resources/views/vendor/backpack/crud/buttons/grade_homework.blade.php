@if ($crud->hasAccess('create'))
    <a href="{{ route('homework.create', $entry) }}" class="btn btn-ghost-warning"
        data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> {{ trans('backpack::crud.add') }}
            {{ trans('backpack::app.homework') }}</span></a>
@endif
