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
/*
Route::prefix('accounts')->group(function () {
    Route::get('{number}', 'Api\AccountController@showBalance');
    Route::put('{number}', 'Api\AccountController@deposit');
});
*/
Route::apiResource('accounts', 'Api\AccountController');
