<?php

use Illuminate\Http\Request;

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
Route::get('/user', function (Request $request) {
    return '123';
})->middleware('auth:api');
Route::group(['prefix' => 'v1', 'middleware' => 'auth.basic'], function () {
    Route::get('/galleries/{id}/photos', 'ApiPhotosController@index');
    Route::resource('/galleries', 'ApiGalleryController');
    // Route::get('/galleries/{id}/galleries', 'ApiGalleryController@index');
    Route::resource('/photos', 'ApiPhotosController');
});
