<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('i.grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-table :for="$grades" striped search-debounce="500">
                        @cell('action', $grade)
                            <Link href="{{ route('grades.show', $grade) }}"
                                class="inline-block px-2 py-1 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded-r shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            <font-awesome-icon icon="fa-solid fa-eye" />
                            </Link>
                            <Link href="{{ route('grades.edit', $grade) }}"
                                class="inline-block px-2 py-1 bg-blue-500 text-white font-medium text-xs leading-tight uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            <font-awesome-icon icon="fa-solid fa-pencil" />
                            </Link>
                            <x-splade-form confirm class="inline-block" action="{{ route('grades.destroy', $grade) }}" method="delete">
                                <x-splade-submit  href="{{ route('grades.destroy', $grade) }}"
                                    class="inline-block px-2 py-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-l shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                <font-awesome-icon icon="fa-solid fa-trash-can" />
                                </x-splade-submit>
                            </x-splade-form>
                        @endcell
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
