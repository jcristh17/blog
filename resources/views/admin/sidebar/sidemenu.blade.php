<nav class="mt-10">
    @can('admin.home')
        <x-side-menu-nav-link href="{{ route('admin.dash') }}" :active="request()->routeIs('admin.dash')">
            <i class="fa-solid fa-house fa-lg"></i><span class="mx-3">Dashboard</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.users.index')
        <x-side-menu-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users*')">
            <i class="fa-solid fa-users fa-lg"></i><span class="mx-3">Users List</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.roles.index')
        <x-side-menu-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles*')">
            <i class="fas fa-fw fa-users-cog fa-lg"></i><span class="mx-3">Roles List</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.permissions.index')
        <x-side-menu-nav-link href="{{ route('admin.permissions.index') }}" :active="request()->routeIs('admin.permissions*')">
            <i class="fas fa-toolbox fa-fw fa-lg"></i><span class="mx-3">Permissions List</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.categories.index')
        <x-side-menu-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories*')">
            <i class="fa-brands fa-buffer fa-xl"></i><span class="mx-3">Categories</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.tags.index')
        <x-side-menu-nav-link href="{{ route('admin.tags.index') }}" :active="request()->routeIs('admin.tags*')">
            <i class="far fa-fw fa-bookmark fa-lg"></i><span class="mx-3">Tags</span>
        </x-side-menu-nav-link>
    @endcan

    <p class="text-white mt-2 text-sm text-center">BLOG OPTIONS</p>
    @can('admin.posts.index')
        <x-side-menu-nav-link href="{{ route('admin.posts.index') }}" :active="request()->routeIs('admin.posts.index')">
            <i class="fas fa-fw fa-clipboard fa-lg"></i><span class="mx-3">Posts List</span>
        </x-side-menu-nav-link>
    @endcan

    @can('admin.posts.create')
        <x-side-menu-nav-link href="{{ route('admin.posts.create') }}" :active="request()->routeIs('admin.posts.create')">
            <i class="fas fa-fw fa-file fa-lg"></i><span class="mx-3">New Post</span>
        </x-side-menu-nav-link>
    @endcan


</nav>
