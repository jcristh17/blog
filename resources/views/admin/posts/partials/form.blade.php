<div class="form group ">
    {!! Form::label('name', 'Post name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Enter the post name']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form group mt-2">
    {!! Form::label('slug', 'Post slug:') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Enter the post slug name',
        'readonly',
    ]) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form group mt-2">
    {!! Form::label('category_id', 'Post Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form group mt-2">
    <p class="font-weight-bold">Post Tags</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach

    @error('tags')
        <br>
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group form group mt-2">
    <p class="font-weight-bold">Post status:</p>
    <label for="" class="mr-3">
        {!! Form::radio('status', 1, true) !!}
        Draft
    </label>
    <label for="">
        {!! Form::radio('status', 2) !!}
        Published
    </label>
    @error('status')
        <br>
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}"
            alt="">
            @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
            alt="">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Image that will be shown in the post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <br>
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores quae ipsam sapiente velit ducimus,
            molestiae provident voluptas reiciendis eaque fugit, cupiditate fuga aliquam! Quae ipsam assumenda
            quaerat atque sed? Expedita.</p>

    </div>
</div>

<div class="form-group form group mt-2">
    {!! Form::label('extract', 'Post Extract:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group form group mt-2">
    {!! Form::label('body', 'Post Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
