<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
    <div>
        @isset($logo)
            {{ $logo }}
        @else
            <Link href="/">
                <x-application-logo class="w-200 h-150 fill-current text-gray-500" />
            </Link>
        @endisset
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden bg-gray-100 sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
