<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Employees Index</h1>
        <div class="p-4">
            <Link href="{{ route('admin.employees.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Employee</Link>
        </div>
    </div>
    <x-splade-table :for="$employees">
        @cell('action', $employee)
            <div class="space-x-2">
                <Link href="{{ route('admin.employees.edit', $employee) }}"
                    class="text-green-400 hover:text-green-700 font-semibold">
                Edit
                </Link>
                <Link href="{{ route('admin.employees.destroy', $employee) }}" method="DELETE" confirm="Delete the employee"
                    confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
                    class="text-red-400 hover:text-red-700 font-semibold">
                Delete
                </Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
