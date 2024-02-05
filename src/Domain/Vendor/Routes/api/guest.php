<?php

use Illuminate\Support\Facades\Route;
use Src\Domain\Vendor\Http\Controllers\SAC\LoginController;

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
    Route::post('/vendor',[LoginController::class,'login']);

});
