<div x-data="{ notificationOpen: false, open: false }" class="relative">

    <button @click="notificationOpen = ! notificationOpen" class="flex mx-4 text-gray-400 focus:outline-none">
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            </path>
        </svg>
        <span class=" font-bold">{{ auth()->user()->notifications->count() }}</span>
    </button>

    <div x-show="notificationOpen" class="absolute right-0 z-10 mt-2 overflow-hidden bg-white rounded-lg shadow-xl w-80"
        style="width: 20rem; display: none;">
        @if (auth()->user()->notifications->count())
            @foreach (auth()->user()->notifications as $notification)
                <div 
                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-gray-900 border-b-4 border-b-gray-900 hover:border-b-white">
                    <i class="{{ $notification->data['icon'] }}"></i>
                    <p class="mx-2 text-sm">
                        <span class="font-bold">{{ $notification->data['comment_user_name'] }}</span>
                        {{ $notification->data['type'] }} <span
                            class="font-bold line-clamp-1 text-indigo-400">{{ $notification->data['body'] }}</span>
                            <a class="inline text-sm float-left text-blue-400  hover:underline" href="{{ route('posts.show', App\Models\Post::find($notification->data['post_id'])) }}">
                                View
                            </a>
                            <a class="inline text-sm float-left ml-2 text-blue-400 hover:cursor-pointer hover:underline" href="{{route('notification.MarkAsRead',$notification)}}">
                                Mark as read
                            </a>
                        <span class="inline text-xs text-right  float-right">
                            {{-- {{ $notification->data['body'] }} --}}{{ $notification->created_at->diffForHumans() }}
                        </span>

                    </p>

                </div>
            @endforeach
        @else
            <a class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                <img class="object-cover w-8 h-8 mx-1 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}">
                <p class="mx-2 text-sm">
                    <span class="font-bold">You don't have notifications...</span>
                </p>
            </a>
        @endif
    </div>
</div>
