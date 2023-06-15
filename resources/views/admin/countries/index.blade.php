<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Countries Index</h1>
        <div class="p-4">
            <Link href="{{ route('admin.countries.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Country</Link>
        </div>
    </div>
    <x-splade-table :for="$countries">
        @cell('action', $country)
            <div class="space-x-2">
                <Link href="{{ route('admin.countries.edit', $country) }}"
                    class="text-green-400 hover:text-green-700 font-semibold">
                Edit
                </Link>
                <Link href="{{ route('admin.countries.destroy', $country) }}" method="DELETE" confirm="Delete the country"
                    confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
                    class="text-red-400 hover:text-red-700 font-semibold">
                Delete
                </Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
