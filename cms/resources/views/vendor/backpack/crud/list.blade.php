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

@section('header')
        <h2>
            <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
            <small id="datatable_info_stack">{!! $crud->getSubheading() ?? '' !!}</small>
        </h2>

@endsection

@section('content')
    {{-- Default box --}}
    <div class="row">
        <div class="card">
        {{-- THE ACTUAL CONTENT --}}
        <div class="{{ $crud->getListContentClass() }}">

            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div id="datatable_search_stack" class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        {{-- <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers"> --}}
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    @if ($crud->buttons()->where('stack', 'top')->count() || $crud->exportButtons())
                        <div class="d-print-none {{ $crud->hasAccess('create') ? 'with-border' : '' }}">

                            @include('crud::inc.button_stack', ['stack' => 'top'])

                        </div>
                    @endif
                </div>
                <!--end::Card toolbar-->
            </div>
            
            {{-- Backpack List Filters --}}
            @if ($crud->filtersEnabled())
                @include('crud::inc.filters_navbar')
            @endif
            <div class="card-body pt-0">
                <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
            <table id="crudTable" class="table table-strip table-hover align-middle table-row-dashed fs-6 gy-3 gs-3 dataTable no-footer"
                data-responsive-table="{{ (int) $crud->getOperationSetting('responsiveTable') }}"
                data-has-details-row="{{ (int) $crud->getOperationSetting('detailsRow') }}"
                data-has-bulk-actions="{{ (int) $crud->getOperationSetting('bulkActions') }}" cellspacing="0">
                <thead>
                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        {{-- Table columns --}}
                        @foreach ($crud->columns() as $column)
                            <th class="pe-2 text-start" data-orderable="{{ var_export($column['orderable'], true) }}"
                                data-priority="{{ $column['priority'] }}" data-column-name="{{ $column['name'] }}"
                                {{--
                    data-visible-in-table => if developer forced field in table with 'visibleInTable => true'
                    data-visible => regular visibility of the field
                    data-can-be-visible-in-table => prevents the column to be loaded into the table (export-only)
                    data-visible-in-modal => if column apears on responsive modal
                    data-visible-in-export => if this field is exportable
                    data-force-export => force export even if field are hidden
                    --}} {{-- If it is an export field only, we are done. --}}
                                @if (isset($column['exportOnlyField']) && $column['exportOnlyField'] === true) data-visible="false"
                      data-visible-in-table="false"
                      data-can-be-visible-in-table="false"
                      data-visible-in-modal="false"
                      data-visible-in-export="true"
                      data-force-export="true"
                    @else
                      data-visible-in-table="{{ var_export($column['visibleInTable'] ?? false) }}"
                      data-visible="{{ var_export($column['visibleInTable'] ?? true) }}"
                      data-can-be-visible-in-table="true"
                      data-visible-in-modal="{{ var_export($column['visibleInModal'] ?? true) }}"
                      @if (isset($column['visibleInExport']))
                         @if ($column['visibleInExport'] === false)
                           data-visible-in-export="false"
                           data-force-export="false"
                         @else
                           data-visible-in-export="true"
                           data-force-export="true" @endif
                            @else data-visible-in-export="true" data-force-export="false" @endif
                        @endif
                        >
                        {{-- Bulk checkbox --}}
                        @if ($loop->first && $crud->getOperationSetting('bulkActions'))
                            {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                        @endif
                        {!! $column['label'] !!}
                        </th>
                        @endforeach

                        @if ($crud->buttons()->where('stack', 'line')->count())
                            <th class="text-start" data-orderable="false"
                                data-priority="{{ $crud->getActionsColumnPriority() }}" data-visible-in-export="false">
                                {{ trans('backpack::crud.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                </tbody>
                {{-- <tfoot>
                    <tr>
                        {{-- Table columns --}}
                       {{--  @foreach ($crud->columns() as $column)
                            <th class="text-start">
                                {{-- Bulk checkbox --}}
                                {{-- @if ($loop->first && $crud->getOperationSetting('bulkActions'))
                                    {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                                @endif
                                {!! $column['label'] !!}
                            </th>
                        @endforeach

                        @if ($crud->buttons()->where('stack', 'line')->count())
                            <th class="text-start">{{ trans('backpack::crud.actions') }}</th>
                        @endif --}}
                    {{-- </tr>
                </tfoot> --}}
            </table>
        </div>
        </div>
        </div>
            {{-- @if ($crud->buttons()->where('stack', 'bottom')->count())
                <div id="bottom_buttons" class="d-print-none text-center text-sm-left">
                    @include('crud::inc.button_stack', ['stack' => 'bottom'])

                    <div id="datatable_button_stack" class="float-right text-right hidden-xs"></div>
                </div>
            @endif --}}

        </div>

    </div>
    </div>
@endsection

@section('after_styles')
    {{-- DATA TABLES --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}">
 {{--    <link rel="stylesheet" type="text/css"
        href="{{ asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"> --}}

    {{-- CRUD LIST CONTENT - crud_list_styles stack --}}
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    @include('crud::inc.datatables_logic')

    {{-- CRUD LIST CONTENT - crud_list_scripts stack --}}
    @stack('crud_list_scripts')
@endsection
