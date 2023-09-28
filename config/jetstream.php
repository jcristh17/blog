<?php

use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

return [

    /*
    |--------------------------------------------------------------------------
    | Jetstream Stack
    |--------------------------------------------------------------------------
    |
    | This configuration value informs Jetstream which "stack" you will be
    | using for your application. In general, this value is set for you
    | during installation and will not need to be changed after that.
    |
    */

    'stack' => 'livewire',

    /*
     |--------------------------------------------------------------------------
     | Jetstream Route Middleware
     |--------------------------------------------------------------------------
     |
     | Here you may specify which middleware Jetstream will assign to the routes
     | that it registers with the application. When necessary, you may modify
     | these middleware; however, this default value is usually sufficient.
     |
     */

    'middleware' => ['web'],

    'auth_session' => AuthenticateSession::class,

    /*
    |--------------------------------------------------------------------------
    | Jetstream Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify the authentication guard Jetstream will use while
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'sanctum',

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Some of Jetstream's features are optional. You may disable the features
    | by removing them from this array. You're free to only remove some of
    | these features or you can even remove all of these if you need to.
    |
    */

    'features' => [
        // Features::termsAndPrivacyPolicy(),
         Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Disk
    |--------------------------------------------------------------------------
    |
    | This configuration value determines the default disk that will be used
    | when storing profile photos for your application's users. Typically
    | this will be the "public" disk but you may adjust this if needed.
    |
    */

    'profile_photo_disk' => 'public',

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        /* [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ], */
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Dashboard',
            'route'         => 'admin.home',
            'icon'        => 'fas fa-tachometer-alt fa-fw',
            'can'  => 'admin.home',
            //'label'       => 4,
            //'label_color' => 'success',
        ],
        ['header' => 'ADMINISTRATOR','can'  => 'admin.categories.index',],
        [
            'text'       => 'Users List',
            'icon' => 'fas fa-fw fa-users',
            'route'  => 'admin.users.index',
            'active'=>  ['admin/users*'],
            'can'  => 'admin.users.index',
        ],
        [
            'text'       => 'Roles List',
            'icon' => 'fas fa-fw fa-users-cog',
            'route'  => 'admin.roles.index',
            'active'=>  ['admin/roles*'],
             'can'  => 'admin.roles.index',
        ],
        [
            'text'       => 'Permissions List',
            'icon' => 'fas fa-toolbox fa-fw',
            'route'  => 'admin.permissions.index',
            'active'=>  ['admin/permissions*'],
             'can'  => 'admin.permissions.index',
        ],
        [
            'text' => 'Categories',
            'route'  => 'admin.categories.index',
            'icon' => 'fa-brands fa-buffer',
            'active'=>  ['admin/categories*'],
            'can'  => 'admin.categories.index',
        ],
        [
            'text' => 'Tags',
            'route'  => 'admin.tags.index',
            'icon' => 'far fa-fw fa-bookmark',
            'active'=>  ['admin/tags*'],
            'can'  => 'admin.tags.index',
        ],
        ['header' => 'BLOG OPTIONS'],
        [
            'text'       => 'Posts List',
            'icon' => 'fas fa-fw fa-clipboard',
            'route'  => 'admin.posts.index',
            'can'  => 'admin.posts.index',
        ],
        [
            'text'       => 'New Post',
            'icon' => 'fas fa-fw fa-file',
            'route'  => 'admin.posts.create',
            'can'  => 'admin.posts.create',
        ],
      
    ],
];
