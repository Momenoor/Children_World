<base href="" />
<meta charset="utf-8" />
<meta name="description"
    content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
<meta name="keywords"
    content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
@if (config('backpack.base.meta_robots_content'))
    <meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'noindex, nofollow') }}">
@endif

<meta name="csrf-token" content="{{ csrf_token() }}" /> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
<title>{{ isset($title) ? $title . ' :: ' . config('backpack.base.project_name') : config('backpack.base.project_name') }}
</title>

@yield('before_styles')
@stack('before_styles')

<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title"
    content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Keenthemes | Metronic" />
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
@if (config('backpack.base.styles') && count(config('backpack.base.styles')))
    @foreach (config('backpack.base.styles') as $path)
        <link rel="stylesheet" type="text/css"
            href="{{ asset($path) }}">
    @endforeach
@endif

@if (config('backpack.base.mix_styles') && count(config('backpack.base.mix_styles')))
    @foreach (config('backpack.base.mix_styles') as $path => $manifest)
        <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">
    @endforeach
@endif

@if (config('backpack.base.vite_styles') && count(config('backpack.base.vite_styles')))
    @vite(config('backpack.base.vite_styles'))
@endif

@yield('after_styles')
@stack('after_styles')
