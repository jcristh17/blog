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
            <i class="fa-regular fa-fw fa-bookmark mr-2 mb-4"></i> New tag form
        </h2>
        {!! Form::open(['route' => 'admin.tags.store']) !!}
        @include('admin.tags.partials.form')
        <x-buttons.primary-button class="btn-primary mt-2" type="submit">Create tag</x-buttons.primary-button>
        {!! Form::close() !!}
    </div>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-',
            });
        });
    </script>
</x-admin-layout>
