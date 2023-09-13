@extends('adminlte::page')

@section('title', 'LaraBlog')

@section('content_header')
    <h1>Show post detail</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, [
                'route' => ['admin.posts.update', $post],
                'autocomplete' => 'off',
                'files' => true,
                'method' => 'PUT',
            ]) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Update post', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;

        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        //script para leer imagen seleccionada y mostrarla
        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#picture').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#file').change(function() {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);
        });
    </script>

@stop
