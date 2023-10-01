<x-admin-layout>
    {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right">New post</a> --}}

    @if (session('info'))
        <x-alerts.success>
            <strong>{{ session('info') }}</strong>
        </x-alerts.success>
    @endif

    <!-- component -->
    <!-- Container -->
    <!--Card -->
    <div
        class="mx-auto w-full p-12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-white rounded-lg shadow-md lg:shadow-lg">

        <!-- Card Title -->
        <h2 class="text-center font-semibold text-2xl lg:text-3xl text-gray-800">
            <i class="fas fa-fw fa-users mr-2 mb-4"></i> Edit user role
        </h2>
        <div class="bg-white rounded  p-4 border-t-2 border-gray-950">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
            <!-- Email Input -->
            <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">User name:</label>
            <x-input class="w-full" value="{{ $user->name }}" disabled />

            <!-- Password Input -->
            <label for="password" class="block mt-4 text-xs font-semibold text-gray-600 uppercase mb-2">Role
                List:</label>
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => ' mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            <!-- Auth Buttton -->
            <!-- Another Auth Routes -->
            <x-buttons.primary-button class="btn-primary mt-2" type="submit">Assing Role</x-buttons.primary-button>
            {{-- {!! Form::submit('Assing Role', ['class'=>'btn-primary']) !!} --}}
            {!! Form::close() !!}
        </div>

    </div>
</x-admin-layout>
