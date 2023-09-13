@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
   {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right">New post</a> --}}
    <h1><i class="fas fa-fw fa-users-cog"></i> Roles List</h1>

@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            @can('admin.roles.create')
                <a class="btn btn-success float-right" href="{{ route('admin.roles.create') }}"> Add role</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Guard Name</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td width="10px">
                                @can('admin.roles.edit')
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.roles.destroy')
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@stop