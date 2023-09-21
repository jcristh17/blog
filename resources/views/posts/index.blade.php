<x-app-layout>

    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                {{-- <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }}@else https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"
                                    class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">
                                    {{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{ route('posts.show', $post) }}" class="">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article> --}}

                <div class="card">
                    @if ($post->image)
                        <img class="card-img-top aspect-video " src="{{ Storage::url($post->image->url) }}" alt="">
                    @else
                        <img class="card-img-top "
                            src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg" alt="">
                    @endif
                    <div class="card-body">
                        <p class="card-text font-bold text-2xl"><a  href="{{ route('posts.show', $post) }}" class="">
                            {{ $post->name }}
                        </a></p>
                        <p class="card-text">Posted by : {{ $post->user->name }}</p>
                        <p class="card-text">Date : {{ $post->created_at }}</p>
                        
                    </div>
                    <div class="card-footer">
                        
                        <p>Tags :
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"
                                    class="inline-block px-3 h-6 bg-gray-500 text-white rounded-full">
                                    {{ $tag->name }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
