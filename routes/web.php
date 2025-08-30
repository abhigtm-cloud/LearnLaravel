<?php

use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/medium/@{user:username}",[PublicProfileController::class,"show"])->name("profile.show");

Route::middleware(['auth', 'verified'])->group(function(){
Route::get('/dashboard',[PostController::class,'index'])->name('dashboard');
Route::get("/post/@{username}/{post:slug}",[PostController::class,'show'])->name('post.show');
Route::post("follow/{user}",[FollowerController::class,'followUnfollow'])->name('follow');
Route::get("/post/create",[PostController::class,'create'])->name('post.create');
Route::post("/post/store",[PostController::class,'store'])->name('post.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
