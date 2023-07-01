<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Edit Permission</h1>
    <x-splade-form :default="$permission" :action="route('admin.permissions.update', $permission)" method="PUT" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" label="Name" />
        <x-splade-select name="roles[]" :options="$roles" multiple relation choices />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
