<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'gids');
Route::redirect('/home', 'gids');

// Profile Guide Routes
Route::group(['prefix' => 'gids'], function () {
    // Different views
    Route::get('/', 'ProfileController@index')->name('guide');
    Route::get('/lijst', 'ProfileController@index')->name('guide.list');
    Route::get('/op-de-kaart', 'ProfileController@index')->name('guide.map');

    Route::get('mijn-profielen', 'ProfileController@myProfiles')->name('profile.list');
    Route::get('nieuw', 'ProfileController@create')->name('profile.create');
    Route::get('{profile}', 'ProfileController@show')->name('profile.show');
    Route::get('{profile}/bewerken', 'ProfileController@edit')->name('profile.edit');

    Route::put('{profile}/bewerken', 'ProfileController@update');
    Route::post('nieuw', 'ProfileController@store')->name('profile.store');
});

// Authentication Routes
Route::group(['prefix' => 'gebruiker'], function () {
    // Profile
    Route::get('bewerken', 'MemberController@edit')->name('user.edit');
    Route::put('bewerken', 'MemberController@update')->name('user.update');

    // Login and Logout Routes...
    Route::get('inloggen', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('inloggen', 'Auth\LoginController@login');
    Route::get('uitloggen', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('aanmelden', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('aanmelden', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('wachtwoord/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('wachtwoord/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('wachtwoord/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('wachtwoord/reset', 'Auth\ResetPasswordController@reset');
});
