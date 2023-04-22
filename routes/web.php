<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\PusherController@index');
Route::post('/', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/message', 'App\Http\Controllers\PusherController@message');
