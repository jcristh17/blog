@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
<a href="{{ route('admin.permissions.create') }}" class="btn btn-success float-right">New permission</a>
    <h1><i class="fas fa-fw fa-users-cog"></i> Permissions List</h1>

@stop
@section('content')
@livewire('admin.permissions-index')
@stop


@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
@stop

@section('js')
   
@stop