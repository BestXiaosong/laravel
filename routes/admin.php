<?php


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

Route::get('/', 'Index@index');
Route::get('/login/login', 'Login@login');
Route::post('/login/check', 'Login@check');
Route::get('/index/index', 'Index@index');
