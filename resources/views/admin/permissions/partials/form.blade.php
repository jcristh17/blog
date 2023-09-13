<div class="form group ">
    {!! Form::label('name', 'Permission name') !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter a permission name']) !!}

    {!! Form::label('description', 'Description name') !!}
    {!! Form::text('description', null, ['class' => 'form-control ', 'placeholder' => 'Enter a description']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>