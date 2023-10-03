<x-app-layout>

    <div class="container mx-auto py-8 ">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>

        {{-- <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div> --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 ">
            {{-- contenido principal --}}
            <div class="col-span-2 bg-gray-100 p-4 rounded">
                <div class="mb-4 md:mb-0 w-full aspect-video mx-auto relative rounded-lg">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));">
                        @if ($post->image)
                            <img class="absolute left-0 top-0 w-full h-full z-0 object-cover rounded"
                                src="{{ Storage::url($post->image->url) }}" alt="">
                        @else
                            <img class="absolute left-0 top-0 w-full h-full z-0 object-cover rounded"
                                src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                                alt="">
                        @endif
                    </div>

                    <div class="p-4 absolute bottom-0 left-0 z-20">
                        <a href="{{ route('posts.category', $post->category->slug) }}"
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $post->category->name }}</a>
                        <h2 class="sm:text-xl lg:text-3xl font-semibold text-gray-100 leading-tight">
                            {!! $post->extract !!}
                        </h2>
                        <div class="flex mt-3">
                            <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-200 text-sm"> {{ $post->user->name }} </p>
                                <p class="font-semibold text-gray-300 text-xs">
                                    {{ $post->created_at->format('l jS \\of F Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-base text-justify text-gray-600 mt-4">

                    {!! $post->body !!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside class="bg-gray-100 p-4 rounded">
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Post related</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li>
                            <a class="" href="{{ route('posts.show', $similar) }}">
                                <div class="w-full md:w-4/7">
                                    <!-- post 1 -->
                                    <div class="rounded w-full flex flex-col md:flex-row mb-10">
                                        @if ($similar->image)
                                            <img class="aspect-video object-cover block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0"
                                                src="{{ Storage::url($similar->image->url) }}" alt="">
                                        @else
                                            <img class="aspect-video  object-cover md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0"
                                                src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                                                alt="">
                                        @endif

                                        <div class="rounded px-4">
                                            <span class="text-green-700 text-sm hidden md:block">
                                                {{ $post->category->name }}
                                            </span>
                                            <div class="md:mt-0 text-gray-800 text-justify font-semibold mb-2">
                                                {{ $similar->name }}
                                            </div>
                                            <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                                            <div class="flex items-center space-x-2">

                                                <p class="mb-1 text-sm text-primary-500"><i
                                                        class="fa-solid fa-user mr-1"></i>{{ $similar->user->name }} •
                                                    <time><i
                                                            class="fa-regular fa-clock mr-1"></i>{{ $similar->created_at->diffForHumans() }}</time>
                                                </p>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
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
