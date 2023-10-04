    <div class=" container mx-auto items-center justify-center shadow-lg mt-20 mb-4 w-full py-2">
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Comments Section {{$post->id}}</h2>
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
                            Send Comment
                        </x-buttons.primary-button>
                    </div>
                </div>
            
        @endauth
        <div>
            @foreach ($comments as $comment)
                <div
                    class="items-center w-full px-6 py-2 mx-auto mt-5 mb-5 bg-white border border-gray-200 rounded-lg xl:w-full">

                    <div>
                        <div class="flex mt-3">
                            <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-600 text-sm"> {{ $comment->user->name }} </p>
                                <p class="font-semibold text-gray-400 text-xs">
                                    {{ $comment->created_at->format('l jS \\of F Y h:i A') }}</p>
                            </div>
                        </div>
                        <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-md">
                            {{ $comment->body }}</p>
                    </div>
                    
                </div>
            @endforeach
            <div class="items-center text-center cursor-pointer" >
                @if ($pagination < $post->comments->count())
                <a wire:click="incrementar()">Show more...</a>
                @else
                <a wire:click="decrementar()">Show less...</a>
                @endif
            </div>
        </div>
    </div>
