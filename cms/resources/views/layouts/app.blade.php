<div class="min-h-screen  bg-gray-100">
    @include('layouts.navigation')
    <div class="flex flex-row h-full">
        <div class="basic-16 h-full bg-white">
            @include('layouts.sidebar')
        </div>
        <!-- Page Heading -->
        <div class="basis-full">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
