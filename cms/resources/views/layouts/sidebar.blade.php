<!-- This is an example component -->
<aside class="w-56" aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-auto rounded bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <Link href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ icon('general.gen001') }}
                <span class="rtl:mr-3">{{ __('i.dashboard') }}</span>
                </Link>
            </li>
            <li>
                <x-splade-toggle>
                    <button type="button" @click.prevent="toggle"
                        class="@if (isActive('grades')) bg-gray-100 @endif flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        {{ icon('general.gen002') }}
                        <span class="flex-1 rtl:mr-3 text-right whitespace-nowrap">{{ __('i.grades') }}</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <x-splade-transition show="toggled">
                        <ul class="py-2 space-y-2 list-disc list-inside">
                            <Link
                                class="@if (isActive('grades')) bg-gray-100 @endif flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="{{ route('grades.index') }}">
                            <li>
                                {{ __('i.all grades') }}
                            </li>
                            </Link>
                            <Link
                                class="@if (isActive('grades/create')) bg-gray-100 @endif flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="{{ route('grades.create') }}">
                            <li>
                                {{ __('i.new grade') }}
                            </li>
                            </Link>
                        </ul>
                    </x-splade-transition>
                </x-splade-toggle>
            </li>
            <li>
                <x-splade-toggle>
                    <button type="button" @click.prevent="toggle"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        {{ icon('general.gen003') }}
                        <span class="flex-1 rtl:mr-3 text-right whitespace-nowrap">{{ __('i.students') }}</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <x-splade-transition show="toggled">
                        <ul class="py-2 space-y-2 list-disc list-inside">
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.all students') }}
                            </li>
                            </Link>
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.new student') }}
                            </li>
                            </Link>
                        </ul>
                    </x-splade-transition>
                </x-splade-toggle>
            </li>
            <li>
                <x-splade-toggle>
                    <button type="button" @click.prevent="toggle"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        {{ icon('general.gen004') }}
                        <span class="flex-1 rtl:mr-3 text-right whitespace-nowrap">{{ __('i.teachers') }}</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <x-splade-transition show="toggled">
                        <ul class="py-2 space-y-2 list-disc list-inside">
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.all teachers') }}
                            </li>
                            </Link>
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.new teacher') }}
                            </li>
                            </Link>
                        </ul>
                    </x-splade-transition>
                </x-splade-toggle>
            </li>
            <li>
                <x-splade-toggle>

                    <button type="button" @click.prevent="toggle"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        {{ icon('general.gen005') }}
                        <span class="flex-1 rtl:mr-3 text-right whitespace-nowrap">{{ __('i.homeworks') }}</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <x-splade-transition show="toggled">
                        <ul class="py-2 space-y-2 list-disc list-inside">
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.all homeworks') }}
                            </li>
                            </Link>
                            <Link
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                                href="">
                            <li>
                                {{ __('i.new homework') }}
                            </li>
                            </Link>
                        </ul>
                    </x-splade-transition>
                </x-splade-toggle>
            </li>
            <li>
                <Link href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ icon('general.gen006') }}
                <span class="rtl:mr-3">{{ __('i.weekly plan') }}</span>
                </Link>
            </li>
            <li>
                <Link href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ icon('general.gen007') }}
                <span class="rtl:mr-3">{{ __('i.activities') }}</span>
                </Link>
            </li>
            <li>
                <Link href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ icon('general.gen008') }}
                <span class="rtl:mr-3">{{ __('i.users list') }}</span>
                </Link>
            </li>
            <li>
                <Link href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ icon('general.gen009') }}
                <span class="rtl:mr-3">{{ __('i.new admin') }}</span>
                </Link>
            </li>
        </ul>
    </div>
</aside>
