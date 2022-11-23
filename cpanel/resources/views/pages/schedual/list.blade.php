@extends(backpack_view('blank'))
@php

    $defaultBreadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        $crud->entity_name_plural => url($crud->route),
        trans('backpack::crud.list') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp
@section('content')
    <div class="card p-0">
        <div class="card-header">
            <div class="row pt-2">
                <div class="col-6">
                    <h2>
                        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
                        <small id="datatable_info_stack">{!! $crud->getSubheading() ?? '' !!}</small>
                    </h2>
                </div>
                <div class="col-6 text-left">
                    {{-- THE ACTUAL CONTENT --}}
                    @if ($crud->buttons()->where('stack', 'top')->count() || $crud->exportButtons())
                        <div class="d-print-none {{ $crud->hasAccess('create') ? 'with-border' : '' }}">

                            @include('crud::inc.button_stack', ['stack' => 'top'])

                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $crud->calendar->calendar() !!}
        </div>
    </div>
@endsection

@section('after_scripts')
    {!! $crud->calendar->script() !!}
@endsection
