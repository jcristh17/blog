<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- contenido principal --}}
            <div class="col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                            alt="">
                    @endif
                </figure>
                <div class="text-base text-justify text-gray-500 mt-4">
                    <p class="card-text font-semibold">Posted by : {{ $post->user->name }}</p>
                    <p class="card-text font-semibold mb-2">Date : {{ $post->created_at }}</p>
                    {!! $post->body !!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex " href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    <img class="w-30 h-20 object-cover object-center"
                                        src="{{ Storage::url($similar->image->url) }}" alt="">
                                @else
                                    <img class="w-30 h-20 object-cover object-center"
                                        src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                                        alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
            <div class="post">
                <p>
                    {{-- <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a> --}}
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                        <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                        </a>
                    </span>
                </p>
                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
            </div>
        </div>

    </div>

</x-app-layout>
