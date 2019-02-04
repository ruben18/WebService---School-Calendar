<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('tasks', 'API\TaskController@index');
    Route::post('task','API\TaskController@create');
    Route::put('task/{id}','API\TaskController@update');
    Route::delete('task/{id}','API\TaskController@delete');
});



Route::post('login','API\AuthController@login');