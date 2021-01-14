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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', 'apiController@users')->name('api.users');

Route::get('/user/{user_id}', 'apiController@user')->name('api.user');

Route::get('/empleados', 'apiController@empleados')->name('api.empleados');

Route::get('/empleado/{empleado_id}', 'apiController@empleado')->name('api.empleado');

Route::get('/roles', 'apiController@roles')->name('api.roles');

Route::get('/rol/{rol_id}', 'apiController@rol')->name('api.rol');

