<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home']);
Route::get('/stars', [MainController::class, 'fav_open']);
Route::get('/my', [MainController::class, 'my']);

Route::post('/about_edit', [MainController::class, 'about_edit']);

Route::get('/user/{id}', [MainController::class, 'user']);

Route::get('/post/delete/{id}', [MainController::class, 'post_delete']);
Route::get('/post/edit/{id}', [MainController::class, 'post_edit']);
Route::post('/post/edit/proc', [MainController::class, 'post_edit_proc']);

Route::get('/login', [MainController::class, 'login']);
Route::post('/login/login', [MainController::class, 'login_proc']);
Route::get('/reg', [MainController::class, 'reg']);
Route::post('/reg/registration', [MainController::class, 'reg_proc']);
Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('/newPost', [MainController::class, 'newPost']);
Route::post('/newPost/create', [MainController::class, 'newPost_proc']);

Route::get('/unfav/{id}', [MainController::class, 'unfav']);
Route::get('/fav/{id}', [MainController::class, 'fav']);
