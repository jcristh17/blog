<div class="card">
    <div class="card-header">
      
        <div class="input-group mb-3">
            <div class="items-center mr-1">

                <select data-bs-toggle="tooltip" data-bs-title="Quantity of entries to show" wire:model.live="qtity"
                    class="mx-3 form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

            </div>
            <span class="input-group-text ml-3" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <x-input type="text" class="flex-1 form-control mr-3" placeholder="Enter a post name"
                wire:model.live="search"></x-input>
        </div>
        @if ($permissions->count())
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="cursor-pointer" wire:click="order('id')">ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-up-1-9 float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="cursor-pointer" wire:click="order('name')">Name
                                {{-- sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer" wire:click="order('description')">Description
                                {{-- sort --}}
                                @if ($sort == 'description')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td width="120px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.permissions.edit', $permission) }}">EDIT <i
                                            class="fa-regular fa-pen-to-square ml-2"></i></a>
                                </td>
                                <td width="120px">
                                    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" >DELETE <i
                                                class="fa-solid fa-trash ml-2"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                @if ($permissions->hasPages())
                    <div class="footer mt-4">
                        {{ $permissions->links() }}
                    </div>
                @endif
            </div>
        @else
            <div class="card-body py-4 px-6">
                No records were found with these search terms...
            </div>
        @endif

    </div>
