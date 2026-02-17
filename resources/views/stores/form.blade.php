<x-app-layout>
    @slot('title', $page_meta['title'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($page_meta['title']) }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.header>
                {{-- <x-card.title>{{ $page_meta['title'] }}</x-card.title> --}}
                <x-card.description>{{ $page_meta['description'] }}
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ $store->exists ? route('stores.update', $store->id) : route('stores.store') }}"
                    method="POST" enctype="multipart/form-data" class="[&div]:mb-6">
                    @if ($store->exists)
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" value="{{ __('Store Name') }}" />
                        <x-text-input id="name" class="block mt-1" type="text" name="name"
                            :value="old('name', $store->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="description" value="{{ __('Description') }}" />
                        <x-textarea id="description" class="block mt-1" name="description" required>{{
                            old('description', $store->description) }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="logo" value="{{ __('Logo') }}" />
                        <div class="flex items-center gap-4 mt-2">
                            <img id="logo-preview" src="{{ $store->logo ? Storage::url($store->logo) : '' }}"
                                alt="{{ $store->name ?? 'Store Logo' }}"
                                class="size-16 rounded-lg object-cover {{ $store->logo ? '' : 'hidden' }}">
                            <div class="relative flex-1 min-w-0">
                                <input id="logo" name="logo" type="file"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                                <div
                                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-white dark:bg-gray-900 flex items-center overflow-hidden">
                                    <div
                                        class="bg-gray-100 dark:bg-gray-800 px-4 py-2 border-r border-gray-300 dark:border-gray-700 text-gray-600 dark:text-gray-400 whitespace-nowrap">
                                        {{ __('Choose File') }}
                                    </div>
                                    <div id="file-name"
                                        class="px-4 py-2 text-gray-500 dark:text-gray-400 truncate flex-1">
                                        {{ $store->logo ? basename($store->logo) : __('No file chosen') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mr-2" as="a" variant="secondary" type="button"
                            href="{{ route('stores.index') }}">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button variant="success" type="submit">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoInput = document.getElementById('logo');
            const previewImage = document.getElementById('logo-preview');
            const nameInput = document.getElementById('name');
            const fileNameDisplay = document.getElementById('file-name');

            logoInput.addEventListener('change', function(event) {
                const [file] = event.target.files;
                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                    previewImage.classList.remove('hidden');
                    if (fileNameDisplay) fileNameDisplay.textContent = file.name;
                }
            });

            nameInput.addEventListener('input', function(event) {
                previewImage.alt = event.target.value || 'Store Logo';
            });
        });
    </script>
</x-app-layout>