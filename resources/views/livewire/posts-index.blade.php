<div>

    <div class="input-group mb-3">
        <select name="category_id" id="" wire:model.live="categoryID"
            class="flex-shrink-0 text-sm text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">

            <option value="">Todas las categorias</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
        <x-input type="text" class="flex-1 form-control" placeholder="Enter a post name"
            wire:model.live="search"></x-input>
            <span class="input-group-text ml-3" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
    </div>
    <div class="hidden lg:inline-block float-left mr-8">
        <div class="mb-4">
            <p class="text-lg font-semibold">Ordenar por</p>
            <select class="form-control" wire:model.live="recents">
                <option value="most_recent">Más recientes</option>
                <option value="oldest">Más antiguos</option>
            </select>
        </div>
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
        <div class="mb-4">
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
        </div>
        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                x-on:click="apply_filters">
                Aplicar filtros
            </button>
        </div>
    </div>
    @if ($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($posts as $post)
                <div class="card">
                    @if ($post->image)
                        <img class="card-img-top aspect-video " src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="card-img-top "
                            src="https://cdn.pixabay.com/photo/2023/09/05/16/49/mushroom-8235504_1280.jpg"
                            alt="">
                    @endif
                    <div class="card-body">
                        <p class="card-text font-bold text-2xl"><a href="{{ route('posts.show', $post) }}"
                                class="">
                                {{ $post->name }}
                            </a></p>
                        <p class="card-text">Author : {{ $post->user->name }}</p>
                        <p class="card-text">Posted : {{ $post->created_at->diffForHumans()  }}</p>

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
            @if ($posts->hasPages())
                <div class="footer mt-4">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    @else
        <div class="card-body py-4 px-6">
            No records were found with these search terms...
        </div>
    @endif
</div>
