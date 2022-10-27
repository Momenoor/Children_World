<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@livewireStyles
<body>
    <div id="wrapper">
        <?php $prefix = Auth::user()->role_key; ?>
        @include("pages.{$prefix}.nav")

        <main>
            <div id="page-wrapper">
                <div class="container-fluid">

                    @if (session()->has('message'))
                        <div class="row" style="margin-top: 20px">
                            <div class="col-12">
                                <div class="alert alert-{{ session()->get('message.type') }} alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ session()->get('message.text') }}</a>.
                                </div>
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>
