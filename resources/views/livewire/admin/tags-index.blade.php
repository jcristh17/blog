<div class="card">
    <div class="card">
        <x-tables.table>
            <x-slot name="tableName"><i class="fa-regular fa-fw fa-bookmark mr-2 mb-4"></i>Tags List
                @can('admin.tags.create')
                    <a class="float-right" href="{{ route('admin.tags.create') }}">
                        <x-buttons.success-button>New tag</x-buttons.success-button>
                    </a>
                @endcan
            </x-slot>
            <x-slot name="tools">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <x-tables.records-select wire:model.live="qtity">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </x-tables.records-select>
                    {{-- <x-tables.filter-select>
                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </x-tables.filter-select> --}}
                </div>
                <x-tables.input-search placeholder="Search" name="search" id="search" wire:model.live="search" />

            </x-slot>
            @if ($tags->count())
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        {{-- <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Color
                        </th> --}}
                        <th
                            class=" w-32 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $tag->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $tag->name }}
                                </p>
                            </td>
                            {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $tag->color }}
                                </p>
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold {{ 'text-' . $tag->color . '-900' }} leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-{{ $tag->color }}-900 opacity-50 rounded-full"></span>
                                    <span class="relative">{{ $tag->color }}</span>
                                </span>
                            </td> --}}
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="inline-flex">
                                    @can('admin.tags.edit')
                                        <a href="{{ route('admin.tags.edit', $tag) }}">
                                            <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                <button
                                                    class="inline-block border-e p-3 text-blue-700 hover:bg-gray-50 focus:relative"
                                                    title="Edit this tag">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </a>
                                    @endcan
                                    @can('admin.tags.destroy')
                                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="ml-1">
                                            @csrf
                                            @method('delete')
                                            <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                <button
                                                    class="inline-block border-e p-3 text-red-700 hover:bg-gray-50 focus:relative"
                                                    title="Delete this tag">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row  xs:justify-between">
                    @if ($tags->hasPages())
                        <div class="footer mt-4">
                            {{ $tags->links() }}
                        </div>
                    @endif
                @else
                    <div class="card-body py-4 px-6">
                        No users were found with these search terms...
                    </div>
            @endif
    </div>
    </x-tables.table>
</div>
</div>
