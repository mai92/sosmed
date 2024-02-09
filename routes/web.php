<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
Route::redirect('/', 'login');

Route::get('/home', \App\Http\Controllers\Home\TimelineController::class)->middleware([
    'auth', 'verified',
])->name('home');

Route::get('/notification', \App\Http\Controllers\Notification\ListNotificationController::class)->middleware([
    'auth', 'verified',
])->name('notification.list');

Route::post('tweet', \App\Http\Controllers\Tweet\TweetStoreController::class)->name('tweet.store');
Route::get('tweet/{tweet}', \App\Http\Controllers\Tweet\TweetShowController::class)->name('tweet.show');
Route::post('tweet/{tweet}/comment',
    \App\Http\Controllers\Tweet\Comment\StoreCommentController::class)->name('tweet.comment.store');

Route::get('/user/{user:username}', \App\Http\Controllers\Profile\ShowProfileController::class)->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
