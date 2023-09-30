<x-admin-layout>
    @if (session('info'))
    <x-alerts.success>
        <strong>{{ session('info') }}</strong>
    </x-alerts.success>
    @endif
    @livewire('admin.users-index')
</x-admin-layout>