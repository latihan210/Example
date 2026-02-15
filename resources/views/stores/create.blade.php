<x-app-layout>
    @slot('title', 'Create a Stores')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.title>{{ __('Create a Stores') }}
            </x-card.title>
            <x-card.description>{{ __('Create a new store to manage your products and orders.') }}
            </x-card.description>
            <form action="{{ route('stores.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-input-label for="name" value="{{ __('Store Name') }}" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="mr-2" as="a" variant="secondary" type="button" href="{{ route('stores.index') }}">
                        {{ __('Cancel') }}
                    </x-button>
                    <x-button variant="success" type="submit">
                        {{ __('Create Store') }}
                    </x-button>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>