@props(['title', 'description'])

<x-card>
    <x-card.header>
        <x-card.title>
            {{ $slot }}
        </x-card.title>
        <x-card.description>
            {{ $slot }}
        </x-card.description>
    </x-card.header>

    <x-card.content>
        {{ $slot }}
    </x-card.content>
</x-card>