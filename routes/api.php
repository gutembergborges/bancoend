<?php

use Illuminate\Http\Request;
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
Route::prefix('accounts')->group(function () {
    Route::put('deposit/{number}', 'Api\AccountController@deposit');
    Route::put('draw/{number}', 'Api\AccountController@draw');
});
Route::apiResource('accounts', 'Api\AccountController');
