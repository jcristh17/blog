@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg mt-4 overflow-hidden">
    @if ($post->image)
    <img class="w-full h-80 object-cover object-center mb-4" src="{{Storage::url($post->image->url)}}" alt="">
    @else
    <img class="w-full h-80 object-cover object-center mb-4" src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg" alt="">
    @endif
   
    <div class="px-6 py-6 ">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2 mb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-500 text-white rounded-full px-3 py-1 text-sm">{{$tag->name}}</a>
        @endforeach
    </div>
</article>