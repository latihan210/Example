<x-app-layout>
    @slot('title', 'Stores')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-end mt-4">
        <x-button class="mr-2" as="a" variant="primary" type="button" href="{{ route('stores.create') }}">
            {{ __('Create Store') }}
        </x-button>
    </div>
</x-app-layout>
