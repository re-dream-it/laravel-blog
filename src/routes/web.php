<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// ADMIN PANEL CONTROLLERS
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use Illuminate\Support\Facades\Route;

// POST CONTROLLERS
use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Post\StoreController as PostStoreController;
use App\Http\Controllers\Post\ShowController as PostShowController;
use App\Http\Controllers\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Post\DeleteController as PostDeleteController;

// Home
Auth::routes();
Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Posts
Route::group(['prefix' => 'posts', 'as' => 'post.'], function (){
    Route::get('/', PostIndexController::class)->name('index'); // Список постов
    Route::post('/', PostStoreController::class)->name('store'); // Обработка формы создания поста
    Route::get('/{post}', PostShowController::class)->name('show'); // Страница поста
    Route::patch('/{post}/update', PostUpdateController::class)->name('update')->middleware('admin'); // Обработка формы редактирования поста
    Route::delete('/{post}/delete', PostDeleteController::class)->name('delete')->middleware('admin'); // Обработка формы создания поста
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function (){
    Route::get('/', AdminIndexController::class)->name('index'); // Главная админ-панели

    // Admin/Post
    Route::group(['prefix' => 'post', 'as' => 'post.'], function (){
        Route::get('/', AdminPostIndexController::class)->name('index'); // Список постов
        Route::get('/create', AdminPostCreateController::class)->name('create'); // Страница создания поста
        Route::get('/{post}/edit', AdminPostEditController::class)->name('edit'); // Страница редактирования поста
    });
});








