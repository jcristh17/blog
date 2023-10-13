<div class="form group ">
    {!! Form::label('name', 'Tag name') !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter tag name']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form group mt-2">
    {!! Form::label('slug', 'Tag slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter tag slug name', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form group mt-2">
    {{-- <label for="">Tags color</label>
    <select class="form-control" name="color" id="color">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
    </select> --}}
    {!! Form::label('color', 'Tag color') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
