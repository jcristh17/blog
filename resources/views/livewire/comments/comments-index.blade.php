    <div class=" container mx-auto items-center justify-center shadow-lg mt-20 mb-4 w-full py-2">
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Comments Section
            ({{ $post->comments->whereNull('parent_id')->count() }})</h2>
        @auth
            @include('livewire.comments.comment-form')
        @endauth
        <div>
            @if ($post->comments->count())
                @foreach ($comments as $comment)
                    <div
                        class="items-center w-full px-6 py-2 mx-auto mt-2 mb-2 bg-white border-l-4 border border-l-green-300 rounded-lg xl:w-full">
                        <div>
                            @auth
                                @if (auth()->user()->id == $comment->user->id)
                                    <x-danger-button title="Delete this comment"
                                        class="mb-2 bg-transparent hover:bg-transparent border-none focus:border-none active:bg-transparent focus:ring-transparent float-right cursor-pointer"
                                        wire:click="deletecomment({{ $comment }})">
                                        <i class="fa-solid fa-trash fa-lg text-gray-700 hover:text-red-500"></i>
                                    </x-danger-button>
                                @endif
                            @endauth
                            <div class="flex mt-3">
                                <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                                    class="h-10 w-10 rounded-full mr-2 object-cover" />
                                <div>
                                    <p class="font-semibold text-gray-600 text-sm"> {{ $comment->user->name }} </p>
                                    <p class="font-semibold text-gray-400 text-xs">
                                        {{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 sm:text-lg md:text-sm">
                                {{ $comment->body }}</p>
                        </div>
                        <div x-data="{ showReplies: false, showInputReply: false }" class="mt-1">
                            @include('livewire.comments.reply-form')
                            <i class="fa-solid fa-thumbs-up  text-gray-700 hover:cursor-pointer hover:text-red-300"></i>
                            @auth
                                <p class="ml-2 inline text-sm hover:underline hover:cursor-pointer"
                                    x-on:click="showInputReply = !showInputReply">Reply<i
                                        class="ml-1 fa-solid fa-comment-dots  text-gray-700"></i></p>
                            @endauth
                            @if ($comment->child->count() > 0)
                                {{-- <x-icon-btn title="Show replies" x-on:click="showReplies = !showReplies"> --}}
                                <div class="inline">
                                    <p class="ml-2 inline text-sm hover:underline hover:cursor-pointer"
                                        x-on:click="showReplies = !showReplies">
                                        Show all replies ({{ $comment->child->count() }})

                                    </p>
                                </div>
                                {{-- </x-icon-btn> --}}
                                @include('livewire.comments.replies')
                            @endif
                        </div>
                    </div>
                @endforeach
                @if ($post->comments->whereNull('parent_id')->count() > 5)
                    <div class="items-center text-center cursor-pointer">
                        @if ($pagination < $post->comments->whereNull('parent_id')->count())
                            <a wire:click="incrementar()" class="hover:underline hover:cursor-pointer">Show more ...</a>
                        @else
                            <a wire:click="decrementar()" class="hover:underline hover:cursor-pointer">Hide
                                comments...</a>
                        @endif
                    </div>
                @endif
            @else
                <div class="items-center text-center cursor-pointer">
                    There are still no comments for this post
                </div>
            @endif

        </div>
    </div>
