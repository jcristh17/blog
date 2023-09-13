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
            <x-input type="text" class="flex-1 form-control mr-3" placeholder="Enter a user name or user email"
                wire:model.live="search"></x-input>
        </div>
        @if ($users->count())
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
                            <th>Email</th>
                            <th >Verified</th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                @if ($user->email_verified_at!='')
                                <td ><i class="fas fa-check-circle fa-lg" style="color: #068e2f;"></i></td>
                                @else
                                <td ><i class="fas fa-times-circle fa-lg" style="color: #ad0123;"></i></td>
                                @endif

                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}"
                                        data-bs-toggle="tooltip" data-bs-title="Edit this user"><i
                                            class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                </td>
                                {{-- <td width="10px">
                                    <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" data-bs-toggle="tooltip"
                                            data-bs-title="Delete this category"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                @if ($users->hasPages())
                    <div class="footer mt-4">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        @else
            <div class="card-body py-4 px-6">
                No users were found with these search terms...
            </div>
        @endif

    </div>
