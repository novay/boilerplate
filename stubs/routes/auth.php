<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Auth')->group(function() 
{
    Route::middleware('guest')->group(function () 
    {
        Route::get('register', 'RegisteredUserController@create')->name('register');
        Route::post('register', 'RegisteredUserController@store');
    
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store');
    
        Route::get('forgot-password', 'PasswordResetLinkController@create')->name('password.request');
        Route::post('forgot-password', 'PasswordResetLinkController@store')->name('password.email');
        
        Route::get('reset-password/{token}', 'NewPasswordController@create')->name('password.reset');
        Route::post('reset-password', 'NewPasswordController@store')->name('password.store');
    });
    
    Route::middleware('auth')->group(function () 
    {
        Route::get('verify-email', 'EmailVerificationPromptController@__invoke')->name('verification.notice');
        Route::get('verify-email/{id}/{hash}', 'VerifyEmailController@__invoke')->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('email/verification-notification', 'EmailVerificationNotificationController@store')->middleware('throttle:6,1')->name('verification.send');
        Route::get('confirm-password', 'ConfirmablePasswordController@show')->name('password.confirm');
        Route::post('confirm-password', 'ConfirmablePasswordController@store');
    
        Route::put('password', 'PasswordController@update')->name('password.update');
    
        Route::post('logout', 'AuthenticatedSessionController@destroy')->name('logout');
    });
});