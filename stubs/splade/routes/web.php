<?php

use Illuminate\Support\Facades\Route;

Route::middleware('splade')->group(function () {
    Route::spladeWithVueBridge();
    Route::spladePasswordConfirmation();
    Route::spladeTable();
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
        Route::patch('/profile', 'ProfileController@update')->name('profile.update');
        Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

        Route::resource('users', UserController::class);
    });

    require __DIR__.'/auth.php';
});