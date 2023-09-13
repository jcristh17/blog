<div class="form group ">
    {!! Form::label('name', 'Role name') !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter rol name']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<h2 class="h3 mt-2">Permissions List</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
           
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            
            {{ $permission->description }}
        </label>
    </div>
@endforeach
