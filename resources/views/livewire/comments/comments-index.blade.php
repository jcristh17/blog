    <div class=" container mx-auto items-center justify-center shadow-lg mt-20 mb-4 w-full py-2">
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Comments Section</h2>
        @auth
            <div class="flex flex-wrap -mx-3 mb-6 w-full">

                <div class="w-full md:w-full mb-2 mt-2">
                    <textarea
                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                        name="body" id="body" placeholder='Type Your Comment' wire:model="Comment"></textarea>
                    <x-input-error for="Comment"></x-input-error>
                </div>
                {{-- <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <div class="w-full flex items-start md:w-full px-3">
                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                    </div> --}}
                <div class="-mr-1">
                    <x-buttons.primary-button wire:click="save()">
                        Leave Comment
                    </x-buttons.primary-button>
                </div>
            </div>

        @endauth
        <div>
            @if ($post->comments->count())
                @foreach ($comments->whereNull('parent_id') as $comment)
                    <div
                        class="items-center w-full px-6 py-2 mx-auto mt-5 mb-5 bg-white border border-gray-200 rounded-lg xl:w-full">
                        <div x-data="{ show: false }">
                            @auth
                                @if (auth()->user()->id == $comment->user->id)
                                    <x-danger-button title="Delete this comment"
                                        class="mb-2 bg-transparent hover:bg-transparent border-none focus:border-none active:bg-transparent focus:ring-transparent float-right cursor-pointer"
                                        wire:click="deletecomment({{ $comment }})">
                                        <i class="fa-solid fa-trash fa-xl text-gray-700 hover:text-red-500"></i>
                                    </x-danger-button>
                                @endif
                                <x-danger-button title="Reply this comment"
                                    class="bg-transparent hover:bg-transparent border-none focus:border-none active:bg-transparent focus:ring-transparent float-right cursor-pointer"
                                    wire:click="" x-on:click="show = !show">
                                    <i class="fa-solid fa-reply fa-xl text-gray-700 hover:text-blue-500"></i>
                                </x-danger-button>
                            @endauth
                            <div class="flex mt-3">
                                <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                                    class="h-10 w-10 rounded-full mr-2 object-cover" />
                                <div>
                                    <p class="font-semibold text-gray-600 text-sm"> {{ $comment->user->name }} </p>
                                    <p class="font-semibold text-gray-400 text-xs">
                                        {{ $comment->created_at->format('l jS \\of F Y h:i A') }}</p>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 sm:text-lg md:text-sm">
                                {{ $comment->body }}</p>
                            <div x-show="show" class="mt-1">

                                <form wire:submit="saveReply({{ $comment }})">
                                    <div class="flex">
                                        <x-input class="w-full" placeholder="your reply" wire:model="reply"
                                            name="reply" id="reply" required></x-input>
                                        <x-buttons.info-button class="ml-1" type="submit"
                                            {{-- wire:click="" --}}>Reply</x-buttons.info-button>
                                    </div>
                                </form>

                                <x-input-error for="reply"></x-input-error>
                            </div>
                        </div>
                        @include('livewire.comments.replies')
                    </div>
                @endforeach
                @if ($post->comments->count() > 2)
                    <div class="items-center text-center cursor-pointer">
                        @if ($pagination < $post->comments->count())
                            <a wire:click="incrementar()">Show more...</a>
                        @else
                            <a wire:click="decrementar()">Show less...</a>
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
