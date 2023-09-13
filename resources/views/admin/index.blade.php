@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>LaraBlog Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Users Registered</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('admin.users.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $posts }}</h3>
                    <p>Published Posts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-clipboard"></i>
                </div>
                <a href="{{route('admin.posts.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">

        </div>
    </div>

@stop

@section('css')
@stop
@section('js')
@stop
