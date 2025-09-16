<?php

use App\Http\Controllers\ClapController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;


Route::get("/medium/@{user:username}",[PublicProfileController::class,"show"])->name("profile.show");

// Test route to serve media files
Route::get('/media/{id}/{filename}', function ($id, $filename) {
    $path = storage_path('app/public/' . $id . '/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
});

   Route::get('/',[PostController::class,'index'])->name('dashboard');
       Route::get("/post/@{username}/{post:slug}",[PostController::class,'show'])->name('post.show'); 

Route::middleware(['auth', 'verified'])->group(function(){
 
// Move this inside auth middleware
    Route::post("/follow/{user}",[FollowerController::class,'followUnfollow'])->name('follow');
    Route::get("/post/create",[PostController::class,'create'])->name('post.create');
        Route::delete("/post/delete/{post}",[PostController::class,'destroy'])->name('post.destroy');

    Route::post("/post/store",[PostController::class,'store'])->name('post.store');
    Route::post('/clap/{post}', [ClapController::class, 'clappost'])->name('clappost');
    Route::get("/category/{category}",[PostController::class,'category'])->name('post.cat');
     Route::get("/posts/{user:username}",[PostController::class,'myPosts'])->name('my.post');
    // Route::get('/clap/{post}', [ClapController::class, 'clapget'])->name('clapget');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroyW'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
