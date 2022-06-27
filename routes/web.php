<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/teste' ,[FacebookController::class, 'loginFacebook']);
Route::get('/fb-callback' ,[FacebookController::class, 'loginCallback']);
Route::get('/webhook', [FacebookController::class, 'webhook']);

