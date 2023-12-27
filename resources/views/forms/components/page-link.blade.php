<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->
        <x-filament::link
            href="/menu/{{ $getRecord()->slug }}"
            icon="heroicon-m-arrow-top-right-on-square"
            label="View menu"
        >
            View menu
        </x-filament::link>
    </div>
</x-dynamic-component>
