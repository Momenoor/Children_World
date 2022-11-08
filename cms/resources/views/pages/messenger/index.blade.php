<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('i.messages') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('pages.messenger.partials.flash')

                    @each('pages.messenger.partials.thread', $threads, 'thread', 'pages.messenger.partials.no-threads')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
