<?php

use App\Http\Controllers\Pusher\BroadcastController;
use App\Http\Controllers\Pusher\IndexController;
use App\Http\Controllers\Pusher\MessageController;
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

Route::get('/', IndexController::class);
Route::post('/', BroadcastController::class);
Route::post('/message', MessageController::class);
