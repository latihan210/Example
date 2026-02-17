<x-app-layout>
    @slot('title', 'Create a Stores')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.header>
                <x-card.title>{{ __('Create a Stores') }}</x-card.title>
                <x-card.description>{{ __('Create a new store to manage your products and orders.') }}
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ route('stores.store') }}" enctype="multipart/form-data" method="POST"
                    class="[&div]:mb-6">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" value="{{ __('Store Name') }}" />
                        <x-text-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required
                            autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="description" value="{{ __('Description') }}" />
                        <x-textarea id="description" class="block mt-1" name="description" required>{{
                            old('description') }}
                        </x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="logo" value="{{ __('Logo') }}" />
                        <input id="logo" name="logo"
                            class="mt-1 w-full block font-medium text-sm text-gray-700 dark:text-gray-300" type="file"
                            required />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mr-2" as="a" variant="secondary" type="button"
                            href="{{ route('stores.index') }}">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button variant="success" type="submit">
                            {{ __('Create Store') }}
                        </x-button>
                    </div>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>