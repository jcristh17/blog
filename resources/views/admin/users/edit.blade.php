<x-admin-layout>
    {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right">New post</a> --}}
    <h1><i class="fas fa-fw fa-users mr-2"></i> Assing role user </h1>

    @if (session('info'))
    <x-alerts.alert-success>
        <strong>{{ session('info') }}</strong>
    </x-alerts.alert-success>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">User name:</p>
            <p class="form-control">{{ $user->name }}</p>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
            <h5>Roles List</h5>
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Assing Role', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</x-admin-layout>