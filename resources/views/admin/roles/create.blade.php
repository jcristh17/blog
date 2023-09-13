@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>Create new Role</h1>
@stop
@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
            
            {!! Form::submit('Create role', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop