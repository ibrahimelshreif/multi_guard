<?php

use Illuminate\Support\Facades\Route;
use Src\Domain\User\Http\Controllers\Auth\LoginController;
use Src\Domain\User\Http\Controllers\Auth\RegisterController;

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


Route::group(['middleware' => 'guest:api'], function () {
    ###CRUD_PLACEHOLDER###
    Route::post('/register',[RegisterController::class,'create']);
});
Route::post('/login',[LoginController::class,'login']);
