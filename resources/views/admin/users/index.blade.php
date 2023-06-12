<x-admin-layout>
    <h1>Users Index</h1>
    <x-splade-table :for="$users">
        @cell('action', $user)
            <Link href="{{ route('admin.users.edit', $user) }}"
                class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded-md">
            Edit</Link>
        @endcell
    </x-splade-table>
</x-admin-layout>
