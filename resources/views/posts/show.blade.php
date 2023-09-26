<x-app-layout>

    <div class="container mx-auto py-8">
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
                    <div class="flex items-center space-x-2">
                        <img class="w-8 h-8 object-cover object-center rounded-full mb-4"
                            src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" />
                        <p class="mb-1 text-md text-primary-500">{{ $post->user->name }} •
                            <time>{{ $post->created_at->diffForHumans() }}</time>
                        </p>
                    </div>
                    {!! $post->body !!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
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
    
                                    <div class="bg-white rounded px-4">
                                        <span class="text-green-700 text-sm hidden md:block"> {{ $post->category->name }}
                                        </span>
                                        <div class="md:mt-0 text-gray-800 text-justify font-semibold mb-2">
                                           {{$similar->name}}
                                        </div>
                                        <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                                        <div class="flex items-center space-x-2">
                                            
                                            <p class="mb-1 text-sm text-primary-500"><i class="fa-solid fa-user mr-1"></i>{{ $similar->user->name }} • 
                                                <time><i class="fa-regular fa-clock mr-1"></i>{{ $similar->created_at->diffForHumans() }}</time>
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
