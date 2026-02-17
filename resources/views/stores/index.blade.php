<x-app-layout>
    @slot('title', 'Stores')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="flex items-center justify-end mb-6">
            <x-button as="a" variant="primary" href="{{ route('stores.create') }}">
                {{ __('Create Store') }}
            </x-button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($stores as $store)
            <x-card>
                <x-card.header>
                    <x-card.title>{{ $store->name }}</x-card.title>
                    <x-card.description>{{ $store->description }}</x-card.description>
                </x-card.header>
                <x-card.content>
                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                        class="size-16 rounded-lg object-cover">
                </x-card.content>
            </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>