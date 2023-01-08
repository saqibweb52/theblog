<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::view('/','welcome');

Route::get('post',[PostController::class,'index'])->middleware(['can:isAdmin, App\Models\Post'])->middleware(['auth', 'verified'])->name('post_index');

Route::post('post',[PostController::class,'create'])->middleware(['auth', 'verified'])->name('create_post');

Route::get('/dashboard',[PostController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('editpost/{id}',[PostController::class,'edit'])->middleware(['can:isAdmin, App\Models\Post'])->middleware(['auth', 'verified']);

Route::put('editpost/{id}',[PostController::class,'update'])->middleware(['auth', 'verified']);

Route::get('deletepost/{id}',[PostController::class,'destroy'])->middleware(['can:isAdmin, App\Models\Post'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
