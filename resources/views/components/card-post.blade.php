@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg mt-4 overflow-hidden w-3/5 h-2/5 mx-auto ">
    @if ($post->image)
    <img class=" w-full object-cover aspect-video mb-4" src="{{Storage::url($post->image->url)}}" alt="">
    @else
    <img class="w-full object-cover aspect-video mb-4" src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg" alt="">
    @endif
   
    <div class="px-6 py-6 ">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
        <div
                            class="overflow-visible relative max-w-sm bg-white border-none rounded-xl flex items-center gap-6 mt-1 ">
                            <img class="absolute -left-2 w-9 h-9 rounded-full shadow-lg"
                                src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                            <div class="flex flex-col py-1 pl-9">
                                <strong
                                    class="text-slate-900 text-sm font-medium dark:text-slate-800">{{ $post->user->name }}</strong>
                                <span
                                    class="text-slate-500 text-sm font-medium dark:text-slate-700">{{ $post->created_at->format('l jS \\of F Y h:i A') }}</span>
                            </div>
                        </div>
    </div>
    <div class="px-6 py-4">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-500 text-white rounded-full px-3 py-1 text-sm">{{$tag->name}}</a>
        @endforeach
    </div>
</article>