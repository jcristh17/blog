@foreach ($comment->child as $item)
    <div class="ml-4 border-l-4 border-l-blue-500 bg-blue-100 rounded"
        x-show="showReplies">
        @auth
            @if (auth()->user()->id == $item->user->id)
                <i class="px-2 py-2 float-right fa-solid fa-trash fa-md text-gray-700 hover:text-red-500"
                    wire:click="deletecomment({{ $item }})">
                </i>
            @endif
        @endauth
        <div class="my-1 p-1">
            <div class="items-center flex ">
                <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"
                    class="h-7 w-7 rounded-full mr-1 object-cover" />

                <p class="font-semibold text-gray-700 text-xs"> {{ $item->user->name }}
                </p>
                <p class="font-semibold text-gray-500 text-xs ml-1">
                    - {{ $item->created_at->diffForHumans() }}</p>
            </div>

            <p class="px-2 text-sm text-gray-600 sm:text-lg md:text-sm">
                {{ $item->body }}</p>
        </div>


    </div>
@endforeach
