<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">New Country</h1>
    <x-splade-form :action="route('admin.countries.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="country_code" label="Code" />
        <x-splade-input name="name" label="Name" />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
