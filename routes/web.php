<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect( '/tweets');
});

Route::get('/dashboard', function() {
    return redirect('/tweets');
});

Route::middleware('auth')->group(function() {
    Route::get('/tweets',  [\App\Http\Controllers\TweetController::class, 'index'])->name('dashboard');
    Route::post('/tweets', [\App\Http\Controllers\TweetController::class, 'store']);

    Route::post('/profiles/{user:username}/follow', [\App\Http\Controllers\FollowController::class, 'store'])->name('follow');
    Route::get('/profiles/{user:username}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profiles.edit')
        ->middleware('can:edit,user');

    Route::patch('/profiles{user:username}', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profiles.update')
        ->middleware('can:edit,user');

    Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'index'])->name('explore');

    Route::post('/tweets/{tweet}/like', [\App\Http\Controllers\TweetLikeController::class, 'store'])->name('like.store');
    Route::delete('/tweets/{tweet}/like', [\App\Http\Controllers\TweetLikeController::class, 'destroy'])->name('like.destroy');
});

Route::get('/profiles/{user:username}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

