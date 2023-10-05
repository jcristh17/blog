@if ($comment->child)
    @foreach ($comment->child as $item)
        <div class="ml-4 border border-gray-200 rounded-lg p-2 my-2 bg-gray-200">
            @auth
                @if (auth()->user()->id == $item->user->id)
                    <x-danger-button title="Delete this reply"
                        class="bg-transparent hover:bg-transparent border-none focus:border-none active:bg-transparent focus:ring-transparent float-right cursor-pointer"
                        wire:click="deletecomment({{ $item }})">
                        <i class="fa-solid fa-trash fa-xl text-gray-700 hover:text-red-500"></i>
                    </x-danger-button>
                @endif
            @endauth
            <div class="flex mt-3">
                <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"
                    class="h-10 w-10 rounded-full mr-2 object-cover" />
                <div>
                    <p class="font-semibold text-gray-600 text-sm"> {{ $item->user->name }}
                    </p>
                    <p class="font-semibold text-gray-400 text-xs">
                        {{ $item->created_at->format('l jS \\of F Y h:i A') }}</p>
                </div>
            </div>

            <p class="mt-2 text-sm text-gray-600 sm:text-lg md:text-sm">
                {{ $item->body }}</p>
        </div>
    @endforeach
@endif
