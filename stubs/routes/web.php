<?php

use Illuminate\Support\Facades\Route;

Route::middleware('splade')->group(function () 
{
    Route::spladeWithVueBridge();
    Route::spladePasswordConfirmation();
    Route::spladeTable();
    Route::spladeUploads();

    Route::namespace('App\Http\Controllers')->group(function () 
    {
        Route::get('/', 'IndexController@index')->name('index');
        Route::post('lang', 'IndexController@lang')->name('lang');
        Route::middleware('auth')->namespace('Panel')->as('panel.')->group(function () 
        {
            Route::view('dashboard', 'panel.dashboard')->middleware(['verified'])->name('index');

            Route::get('profile', 'ProfileController@edit')->name('profile.edit');
            Route::patch('profile', 'ProfileController@update')->name('profile.update');
            Route::delete('profile', 'ProfileController@destroy')->name('profile.destroy');

            Route::resource('users', 'UserController');

            // Put your routes here
            // ...
        });
    });

    require __DIR__.'/auth.php';
});