<div class="card">
    <div class="card">
        <x-tables.table>
            <x-slot name="tableName"><i class="fas fa-fw fa-users mr-2 mb-4"></i>Users List</x-slot>
            <x-slot name="tools">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <x-tables.records-select wire:model.live="qtity">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-tables.records-select>
                    <x-tables.filter-select>
                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </x-tables.filter-select>
                </div>
                <x-tables.input-search placeholder="Search" name="search" id="search" wire:model.live="search" />
            </x-slot>
            @if ($users->count())
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Rol
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th 
                            class=" w-32 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full" src="{{ $user->profile_photo_url }}"
                                            alt="{{ $user->name }}" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $user->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    @if ($user->roles->count())
                                        @if ($user->roles->count() > 1)
                                            @if ($user->hasRole('Admin'))
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-700 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-300 opacity-50 rounded border-solid border-2 border-green-700 ">

                                                    </span>
                                                    <span
                                                        class="relative">{{ $user->roles->pluck('name')->implode(', ') }}</span>
                                                </span>
                                            @endif
                                        @else
                                            @if ($user->hasRole('Admin'))
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-700 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-300 opacity-50 rounded border-solid border-2 border-green-700">

                                                    </span>
                                                    <span
                                                        class="relative">{{ $user->roles->pluck('name')->implode(',') }}</span>
                                                </span>
                                            @endif
                                            @if ($user->hasRole('Blogger'))
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-yellow-700 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-yellow-400 opacity-50 rounded-lg border-dashed border-2 border-gray-700">
                                                    </span>
                                                    <span
                                                        class="relative">{{ $user->roles->pluck('name')->implode(',') }}</span>
                                                </span>
                                            @endif
                                        @endif
                                    @else
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-gray-700 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-gray-400 opacity-50 rounded-lg">
                                            </span>
                                            <span
                                                class="relative">No Role</span>
                                        </span>
                                    @endif
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $user->email }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                @if ($user->email_verified_at != '')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Verified</span>
                                    </span>
                                @else
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Not Verified</span>
                                    </span>
                                @endif

                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a class=" bg-blue-700 p-2 rounded text-white hover:bg-blue-500"
                                    href="{{ route('admin.users.edit', $user) }}" data-bs-toggle="tooltip"
                                    data-bs-title="Edit this user">Edit Role</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row  xs:justify-between          ">
                    @if ($users->hasPages())
                        <div class="footer mt-4">
                            {{ $users->links() }}
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
