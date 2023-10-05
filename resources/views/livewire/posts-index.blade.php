<div>
    <div class=" w-2/3 rounded-lg bg-gray-200 my-2 px-2 mx-auto">
        <x-icon-input class="w-full rounded-lg" icon="fa-solid fa-magnifying-glass text-indigo-600" placeholder="search"
            id="search" wire:model.live.debounce.150ms="search" autocomplete="search" name="search" />
    </div>
    <div class="mb-6">
        <p class="text-lg font-semibold">Ordenar por</p>
        <select
            class="focus:border-indigo-900 focus:ring-indigo-900 flex-shrink-0 text-sm text-center text-gray-900 bg-gray-100 border border-gray-300 rounded hover:bg-gray-200 "
            wire:model.live="order">
            <option value="desc">Más recientes</option>
            <option value="asc">Más antiguos</option>
        </select>
        <select name="category_id" id="" wire:model.live="categoryID"
            class="focus:border-indigo-900 focus:ring-indigo-900 flex-shrink-0 text-sm text-center text-gray-900 bg-gray-100 border border-gray-300 rounded hover:bg-gray-200 ">

            <option value="">Todas las categorias</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
    </div>
    <div class="mb-2">

        <div class="hidden lg:inline-block float-left mr-8">
            {{-- <div class="mb-4">
            <p class="text-lg font-semibold">Categorías</p>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <label>
                            <input wire:model.live="filters.category.{{ $category->id }}"
                                id="checkbox{{ $category->id }}" checked type="checkbox" value="">
                            {{ $category->name }}
                            <input type="checkbox"
                                
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                 name="category" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div> --}}
            {{-- <div class="mb-4">
            <p class="text-lg font-semibold">Tags</p>
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <label>
                            <input type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="category" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div> --}}
            {{-- <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                x-on:click="apply_filters">
                Aplicar filtros
            </button>
        </div> --}}
        </div>
        @if ($posts->count())

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($posts as $post)
                    <article class="overflow-hidden rounded-lg shadow-lg transition hover:shadow-2xl">
                        @if ($post->image)
                            <img class="h-56 w-full object-cover" src="{{ Storage::url($post->image->url) }}"
                                alt="">
                        @else
                            <img class="h-56 w-full object-cover"
                                src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                                alt="">
                        @endif

                        <div class="bg-white p-4 sm:p-6">
                            <time datetime="2022-10-10" class="flex items-center text-xs text-gray-500">
                                <img class=" w-8 h-8 rounded-full shadow-lg mr-1"
                                src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"> {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
                            </time>

                            <a href="{{ route('posts.show', $post) }}">
                                <h3 class="mt-0.5 text-lg/relaxed text-gray-900">
                                    {{ $post->name }}
                                </h3>
                            </a>

                            {{-- <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                {{ $post->extract }}
                            </p> --}}
                            <div class="mt-1 flex gap-2">
                                <p>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('posts.tag', $tag) }}"
                                            class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                            {{ $tag->name }}</a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        
                    </article>

                @endforeach

            </div>
            @if ($posts->hasPages())
                <div class="footer my-4 mx-auto">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div class="card-body py-4 px-6">
                No records were found with these search terms...
            </div>
        @endif

    </div>
