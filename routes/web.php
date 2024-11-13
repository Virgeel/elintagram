<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CommentController;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;



Route::get('/', function () {
    return view('register');
});


Route::get('/home',[HomeController::class,'home']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/profile',[ProfileController::class,'index']);
Route::get('/editprofile/{id}',[ProfileController::class,'editprofileindex']);
Route::post('/editprofile/{id}',[ProfileController::class,'edit']);

Route::get('post/{id}/create',[PostController::class,'create']);
Route::post('post/{id}/create',[PostController::class,'store']);
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/archive/{id}', [ArchiveController::class, 'index']);

Route::get('/download-posts', function () {
    return Excel::download(new PostsExport, 'posts.xlsx');
});

Route::post('/commenttopost/{id}', [CommentController::class, 'create']);