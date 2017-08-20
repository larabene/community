<?php

Route::get('/', function () {
    return redirect()->route('guide');
});
Route::get('/home', function () {
    return redirect()->route('guide');
});

// Profile Guide Routes
Route::group(['prefix' => 'gids'], function () {
    // Different views
    Route::get('/', ['as' => 'guide', 'uses' => 'ProfileController@index']);
    Route::get('/lijst', ['as' => 'guide.list', 'uses' => 'ProfileController@index']);
    Route::get('/op-de-kaart', ['as' => 'guide.map', 'uses' => 'ProfileController@index']);

    Route::get('mijn-profielen', ['as' => 'profile.list', 'uses' => 'ProfileController@myProfiles']);
    Route::get('nieuw', ['as' => 'profile.create', 'uses' => 'ProfileController@create']);
    Route::get('{profile}', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);
    Route::get('{profile}/bewerken', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);

    Route::put('{profile}/bewerken', ['uses' => 'ProfileController@update']);
    Route::post('nieuw', ['as' => 'profile.store', 'uses' => 'ProfileController@store']);
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
