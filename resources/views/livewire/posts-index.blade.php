<div>
    <div class=" w-2/3 rounded-lg bg-gray-200 my-4 p-2 mx-auto">
        <div class="flex" >
            <select name="category_id" id="" wire:model.live="categoryID"
                class="focus:border-indigo-900 focus:ring-indigo-900 flex-shrink-0 text-sm text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 ">

                <option value="">Todas las categorias</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
            <x-input type="text" name="search" class="w-full bg-white pl-3 text-base outline-0 rounded-sm focus:border-indigo-900 focus:ring-indigo-900" placeholder="search"
                  id="search" wire:model.live.debounce.150ms="search" autocomplete="search"/>
            
            <div class="flex w-10 items-center justify-center rounded-r-lg border-white bg-indigo-900 border-separate">
                <i class="fa-solid fa-magnifying-glass text-white"></i>
            </div>
        </div>

    </div>
    <div class="mb-6">
        <p class="text-lg font-semibold">Ordenar por</p>
        <select
            class="focus:border-indigo-900 focus:ring-indigo-900 flex-shrink-0 text-sm text-center text-gray-900 bg-gray-100 border border-gray-300 rounded hover:bg-gray-200 "
            wire:model.live="recents">
            <option value="most_recent">Más recientes</option>
            <option value="oldest">Más antiguos</option>
        </select>
    </div>

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($posts as $post)
                <div class="mx-auto max-w-md overflow-hidden rounded-lg bg-white shadow">
                    @if ($post->image)
                        <img class="aspect-video w-full object-cover" src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="aspect-video w-full object-cover"
                            src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                            alt="">
                    @endif
                    <div class="p-4">

                        <h3 class="text-xl text-justify font-medium text-gray-900"><a
                                href="{{ route('posts.show', $post) }}" class="">
                                {{ $post->name }}
                            </a></h3>
                        <div
                            class="overflow-visible relative max-w-sm mx-auto bg-white  ring-1 ring-black/5 rounded-xl flex items-center gap-6  dark:highlight-white/5">
                            <img class="absolute -left-2 w-9 h-9 rounded-full shadow-lg"
                                src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                            <div class="flex flex-col py-1 pl-9">
                                <strong
                                    class="text-slate-900 text-sm font-medium dark:text-slate-800">{{ $post->user->name }}</strong>
                                <span
                                    class="text-slate-500 text-sm font-medium dark:text-slate-700">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        {{-- <p class="mt-1 text-gray-500">{{ $post->extract }}</p> --}}
                        <hr class="mt-1">
                        <div class="mt-4 flex gap-2">
                            <p>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('posts.tag', $tag) }}"
                                        class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        {{ $tag->name }}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        @if ($posts->hasPages())
            <div class="footer mt-4 mx-auto">
                {{ $posts->links() }}
            </div>
        @endif
    @else
        <div class="card-body py-4 px-6">
            No records were found with these search terms...
        </div>
    @endif
    
</div>
