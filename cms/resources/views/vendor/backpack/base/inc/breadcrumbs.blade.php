@if (config('backpack.base.breadcrumbs') && isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs))
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">{{ $title }}</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
            <!--begin::Item-->
            @foreach ($breadcrumbs as $label => $link)
                @if ($link)
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary"
                            href="{{ $link }}">{{ $label }}</a></li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                @else
                    <li class="breadcrumb-item text-dark" aria-current="page">{{ $label }}</li>
                @endif
            @endforeach
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endif
