<x-admin-layout>
    @if (session('info'))
        <x-alerts.success>
            <strong>{{ session('info') }}</strong>
        </x-alerts.success>
    @endif
    @livewire('admin.tags-index')
</x-admin-layout>
