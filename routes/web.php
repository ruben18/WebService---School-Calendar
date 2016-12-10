<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('user/info','UserController@info');


//API ROUTES
<<<<<<< HEAD
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home','HomeController@index');
});

=======
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    Route::post('api/auth/login', 'Auth\LoginController@login');
});
>>>>>>> parent of 5821403... Install passport, trying to see who it works.
