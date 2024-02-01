<?php

use Illuminate\Support\Facades\Route;
use Src\Domain\Client\Http\Controllers\SAC\ClientProfileController;

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


Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('/clients','ClientController');
	###CRUD_PLACEHOLDER###
});

Route::group(['middleware' => 'auth:client-api','scope:client'], function () {
    Route::get('/client-profile',[ClientProfileController::class,'show']);
	###CRUD_PLACEHOLDER###
});