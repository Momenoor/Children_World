@extends(backpack_view('blank'))

@php
    $defaultBreadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        $crud->entity_name_plural => url($crud->route),
        trans('backpack::crud.preview') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="container-fluid d-print-none d-flex flex-row align-items-center">
        <div class="fs-2 ">
            <span class="text-capitalize pe-3">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
            <small>{!! $crud->getSubheading() ?? mb_ucfirst(trans('backpack::crud.preview')) . ' ' . $crud->entity_name !!}.</small>
            @if ($crud->hasAccess('list'))
                <small class=""><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i>
                        {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
            @endif
                </div>
        <div class="">
            <a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="{{ $crud->getShowContentClass() }}">

            {{-- Default box --}}
            <div class="">
                @if ($crud->model->translationEnabled())
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            {{-- Change translation button group --}}
                            <div class="btn-group float-right">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ trans('backpack::crud.language') }}:
                                    {{ $crud->model->getAvailableLocales()[request()->input('_locale') ? request()->input('_locale') : App::getLocale()] }}
                                    &nbsp; <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($crud->model->getAvailableLocales() as $key => $locale)
                                        <a class="dropdown-item"
                                            href="{{ url($crud->route . '/' . $entry->getKey() . '/show') }}?_locale={{ $key }}">{{ $locale }}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card no-border">
                    <table class="table table-striped mb-0">
                        <tbody>
                            @foreach ($crud->columns() as $column)
                                <tr class="mb-7">
                                    <td class="col-lg-4 fw-bold text-muted ps-5">
                                        <strong>{!! $column['label'] !!}:</strong>
                                    </td>
                                    <td class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">
                                            @php
                                                // create a list of paths to column blade views
                                                // including the configured view_namespaces
                                                $columnPaths = array_map(function ($item) use ($column) {
                                                    return $item . '.' . $column['type'];
                                                }, \Backpack\CRUD\ViewNamespaces::getFor('columns'));

                                                // but always fall back to the stock 'text' column
                                                // if a view doesn't exist
if (!in_array('crud::columns.text', $columnPaths)) {
    $columnPaths[] = 'crud::columns.text';
                                                }
                                            @endphp
                                            @includeFirst($columnPaths)
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($crud->buttons()->where('stack', 'line')->count())
                                <tr>
                                    <td class="col-lg-4 fw-bold text-muted ps-5">
                                        {{ trans('backpack::crud.actions') }}</td>
                                    <td class="fw-bold fs-6 text-gray-800">
                                        @include('crud::inc.button_stack', ['stack' => 'line'])
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>{{-- /.box-body --}}
            </div>{{-- /.box --}}

        </div>
    </div>
@endsection
