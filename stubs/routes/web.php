<?php

use Illuminate\Support\Facades\Route;

Route::middleware('splade')->group(function () 
{
    Route::spladeWithVueBridge();
    Route::spladePasswordConfirmation();
    Route::spladeTable();
    Route::spladeUploads();

    Route::view('/', 'welcome');
    Route::middleware('auth')->namespace('App\Http\Controllers\Panel')->as('panel.')->group(function () 
    {
        Route::view('dashboard', 'panel.dashboard')->middleware(['verified'])->name('index');

        Route::get('profile', 'ProfileController@edit')->name('profile.edit');
        Route::patch('profile', 'ProfileController@update')->name('profile.update');
        Route::delete('profile', 'ProfileController@destroy')->name('profile.destroy');

        Route::resource('users', 'UserController');

        // Put your routes here
        // ...
    });

    require __DIR__.'/auth.php';
});