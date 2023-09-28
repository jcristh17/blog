
<x-admin-layout>
    <h1>Users List</h1>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.users-index')
</x-admin-layout>