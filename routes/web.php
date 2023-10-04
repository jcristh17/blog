<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthGoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchPostsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
Route::get('search', [SearchPostsController::class, 'posts'])->name('search.posts');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/addpasswordgoogle', [AuthGoogleController::class, 'setPasswordIndex'])->name('setPasswordIndex');
    Route::patch('/setPasswordUser/{user}', [AuthGoogleController::class, 'setPasswordUser'])->name('setPasswordUser');
});
//register with google routes
Route::get('/auth/redirect', [AuthController::class, 'redirect']);
Route::get('/auth/callback-url', [AuthController::class, 'callback']);
//login with google routes
Route::get('/login/redirect', [AuthGoogleController::class, 'redirect']);
Route::get('/login/callback-url', [AuthGoogleController::class, 'callback']);
