<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'Base@index');
Route::get('/1', 'Base@index');
Route::any('/api/index', 'Api@index');

//批量注册路由
Route::group(['prefix'=>'api/v1'],function (){
    Route::resource('Users','UsersController');
});