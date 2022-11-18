@if (isset($saveAction['active']) && !is_null($saveAction['active']['value']))
    <div id="saveActions" class="form-group mt-5">

        <input type="hidden" name="_save_action" value="{{ $saveAction['active']['value'] }}">
        @if (!empty($saveAction['options']))
            <div class="btn-group" role="group">
        @endif

        <button type="submit" class="btn btn-success">
            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
            <span data-value="{{ $saveAction['active']['value'] }}">{{ $saveAction['active']['label'] }}</span>
        </button>

        <div class="btn-group" role="group">
            @if (!empty($saveAction['options']))
                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end"><span
                        class="caret"></span><span class="sr-only">&#x25BC;</span></button>
                <div class="menu menu-sub menu-sub-dropdown" data-kt-menu="true" id="kt_menu_63774a7302ae4">
                    @foreach ($saveAction['options'] as $value => $label)
                        <div class="menu-item px-3">
                            <a class="menu-link px-3" href="javascript:void(0);"
                                data-value="{{ $value }}">{{ $label }}</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @if (!empty($saveAction['options']))
    </div>
@endif

@if (!$crud->hasOperationSetting('showCancelButton') || $crud->getOperationSetting('showCancelButton') == true)
    <a href="{{ $crud->hasAccess('list') ? url($crud->route) : url()->previous() }}" class="btn btn-dark"><span
            class="la la-ban"></span> &nbsp;{{ trans('backpack::crud.cancel') }}</a>
@endif

</div>
@endif
