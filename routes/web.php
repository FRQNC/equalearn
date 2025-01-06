<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::get('/', [UserController::class, 'indexPage'])->name('landing');
Route::get('/register', [UserController::class, 'registerView'])->name('register')->middleware(RedirectIfAuthenticated::class);
Route::post('/register/process', [UserController::class, 'addUser'])->middleware(RedirectIfAuthenticated::class);
Route::get('/login', [UserController::class, 'loginView'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/login/process', [UserController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('/@{username}', [UserController::class, 'viewUser'])->name('user.view');
Route::get('/@{username}/{post_title}', [PostController::class, 'viewPost'])->name('post.view');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/post/delete-image', [PostController::class, 'deleteImageFromPost'])->name('post.deleteImage');
    Route::post('/post/upload-image', [PostController::class, 'uploadImageToPost'])->name('post.addImage');
    Route::get('/post/fetch-link-preview', [PostController::class, 'fetchLinkPreview'])->name('post.fetchLink');
    Route::get('/add-post', [PostController::class, 'addPostView'])->name('post.addView');
    Route::post('/post/add-post', [PostController::class, 'addPost'])->name('post.add');
    Route::post('/post/rate-post', [PostController::class, 'ratePost'])->name('post.rate');
    Route::delete('/post/delete-post', [PostController::class, 'deletePost'])->name('post.delete');
});
