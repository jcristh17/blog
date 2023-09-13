@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>Edit Permission</h1>
@stop
@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission], 'method' => 'PUT']) !!}
            @include('admin.permissions.partials.form')
           
            {!! Form::submit('Update permission', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop