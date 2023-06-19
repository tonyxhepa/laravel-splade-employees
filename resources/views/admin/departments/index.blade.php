<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Departments Index</h1>
        <div class="p-4">
            <Link href="{{ route('admin.departments.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Department</Link>
        </div>
    </div>
    <x-splade-table :for="$departments">
        @cell('action', $department)
            <div class="space-x-2">
                <Link href="{{ route('admin.departments.edit', $department) }}"
                    class="text-green-400 hover:text-green-700 font-semibold">
                Edit
                </Link>
                <Link href="{{ route('admin.departments.destroy', $department) }}" method="DELETE"
                    confirm="Delete the department" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
                    class="text-red-400 hover:text-red-700 font-semibold">
                Delete
                </Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
