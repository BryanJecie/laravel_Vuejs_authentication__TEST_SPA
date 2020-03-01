<?php

use Illuminate\Http\Request;


Route::post('/users/login', 'Auth\LoginController@login')
    ->name('user.login');
Route::post('/users', 'Auth\RegisterController@register')
    ->name('user.register');

Route::post('/user/update', 'Auth\RegisterController@update')
    ->name('user.update');

// Route::get('/getUsers', 'UserController@getgetUsers')
//     ->name('user.users');

Route::middleware('auth:api')->group(function () {
    Route::get('/token/validate', 'UserController@getAuthenticatedUser')
        ->name('passport.token.validate');

    Route::get('/user', 'UserController@getAuthenticatedUser')
        ->name('user.authenticated');

    Route::get('/user/{id}', 'UserController@getUser')
        ->name('user.authenticated');

    Route::get('/users/logout', 'Auth\LoginController@logout')
        ->name('user.logout');
});
