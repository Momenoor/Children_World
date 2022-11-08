<div>
    <Link href="{{ route($model . '.show', $item) }}"
        class="inline-block px-2 py-1 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded-r shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
    <font-awesome-icon icon="fa-solid fa-eye" />
    </Link>
    <Link href="{{ route($model . '.edit', $item) }}"
        class="inline-block px-2 py-1 bg-blue-500 text-white font-medium text-xs leading-tight uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
    <font-awesome-icon icon="fa-solid fa-pencil" />
    </Link>
    <div
        class="inline-block bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-l shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
        <x-splade-form confirm action="{{ route($model . '.destroy', $item) }}" method="delete">
            <x-splade-submit href="{{ route($model . '.destroy', $item) }}"
                class="inline-block px-2 py-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-l shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                <font-awesome-icon icon="fa-solid fa-trash-can" />
            </x-splade-submit>
        </x-splade-form>
    </div>
</div>
