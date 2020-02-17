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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'AuthController@login');
Route::post('/signup', 'AuthController@register');
Route::get('/users', 'AuthController@getAllUsers');
Route::get('/user/{id}', 'UserController@getUserByID');
Route::post('/user/update', 'UserController@updateUser');
