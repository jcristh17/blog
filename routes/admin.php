<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () { */
Route::get('',[HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');
Route::resource('permissions', PermissionsController::class)->except('show')->names('admin.permissions');
Route::get('admindash',[HomeController::class, 'Adash'])->middleware('can:admin.home')->name('admin.dash');

/* }); */