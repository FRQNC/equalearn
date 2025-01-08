<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

use App\Http\Middleware\RedirectIfAuthenticated;
use Carbon\Carbon;

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
    Route::get('/@{username}/edit/{id}', [PostController::class, 'editPostView'])->name('post.editView');
    Route::put('/post/edit-post', [PostController::class, 'editPost'])->name('post.edit');
    Route::delete('/post/delete-post', [PostController::class, 'deletePost'])->name('post.delete');
});


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::get('/article-detail', function () {
    return view('article-detail');
})->name('article-detail');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/dashboard', [PostController::class, 'getDataByMonth'])->name('dashboard');


Route::get('/profile/{id}', [ProfileController::class, 'show']);

// Route::get('/login2', function () {
//     return view('auth.login2');
// })->name('login2');

// Route::get('/register2', function () {
//     return view('auth.register2');
// })->name('register2');


