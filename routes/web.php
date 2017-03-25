<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/categories/activate/{id}',['as'=>'categories.activate','uses'=>'CategoriesController@activate']);
    Route::delete('/categories/deactivate/{id}',['as'=>'categories.deactivate','uses'=>'CategoriesController@deactivate']);
    Route::resource('/categories',"CategoriesController");
    Route::delete('/photos/activate/{id}',['as'=>'photos.activate','uses'=>'PhotosController@activate']);
    Route::delete('/photos/deactivate/{id}',['as'=>'photos.deactivate','uses'=>'PhotosController@deactivate']);
    Route::resource('/photos',"PhotosController");
    Route::get('/', 'HomeController@index')->name("main");
    Route::get('/minor', 'HomeController@minor')->name("minor");
});