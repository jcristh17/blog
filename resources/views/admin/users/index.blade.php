<x-admin-layout>
    @if (session('info'))
    <x-alerts.alert-success>
        <strong>{{ session('info') }}</strong>
    </x-alerts.alert-success>
    @endif
    @livewire('admin.users-index')
</x-admin-layout>