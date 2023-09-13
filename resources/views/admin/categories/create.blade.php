@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>Create new category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="form group ">
                {!! Form::label('name', 'Category name') !!}
                {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter category name']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form group mt-2">
                {!! Form::label('slug', 'Category slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter category slug name', 'readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Create category', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
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
@stop
