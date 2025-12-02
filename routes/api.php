<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    //Posts
    Route::get('/', function (){
        return 'hello';
    });
    
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/post/new', [PostController::class, 'create']);
    Route::put('post/update/{post}', [PostController::class, 'update']);
    Route::get('/post/{post}', [PostController::class, 'show']);
    Route::delete('post/delete/{post}', [PostController::class, 'destroy']);


    //Auth
    Route::post('/auth/register', [UserController::class, 'register']);
    Route::post('/auth/login', [UserController::class, 'login']);
    Route::post('/auth/me/{user}', [UserController::class, 'me']);
    //Route::middleware('auth:sanctum');
