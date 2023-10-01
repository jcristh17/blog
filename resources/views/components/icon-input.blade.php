<div class="relative w-full mx-auto py-2">
    @if ($icon)
        <span class="absolute inset-y-0 left-0 flex items-center pl-3" mode="render" block="">
            <i class="{{$icon}}"></i>
        </span>
        <x-input
        {{ $attributes->merge(['class' => 'pr-4 pl-10 h-10 border border-gray-200 rounded-r-lg outline-none focus:ring-1 ring-blue-300']) }} />
    @endif
</div>