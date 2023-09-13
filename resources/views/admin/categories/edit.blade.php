@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}
            <div class="form group ">
                {!! Form::label('name', 'Category name') !!}
                {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter category name']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form group mt-2">
                {!! Form::label('slug', 'Category slug') !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Enter category slug naFme',
                    'readonly',
                ]) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {!! Form::submit('Update category', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
