<div class="bg-white rounded  p-4 border-t-2 border-gray-950">
    {!! Form::label('name', 'Tag name:', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mb-2']) !!}
    {!! Form::text('name', null, [
        'class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ',
        'placeholder' => 'Enter tag name',
    ]) !!}
    @error('name')
        <span class="text-danger ">{{ $message }}</span>
    @enderror
    {!! Form::label('slug', 'Tag slug:', [
        'class' => 'block text-xs font-semibold text-gray-600 uppercase mb-2 mt-2',
    ]) !!}
    {!! Form::text('slug', null, [
        'class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        'placeholder' => 'Enter tag slug name',
        'readonly',
    ]) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    {!! Form::label('color', 'Tag color:', [
        'class' => 'block text-xs font-semibold text-gray-600 uppercase mb-2 mt-2',
    ]) !!}
    {!! Form::select('color', $colors, null, ['class' => 'rounded border-1 border-gray-300']) !!}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
