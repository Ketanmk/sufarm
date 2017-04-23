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
    Route::group(['middleware' => 'superAdmin_auth'], function () {
        Route::get('/users/tokens', ['as' => 'users.tokens', 'uses' => 'UsersController@tokens']);
        Route::get('/users/editmypassword/{id}', ['as' => 'users.editmypassword', 'uses' => 'UsersController@editMyPassword']);
        Route::patch('/users/editmypassword/{id}', ['as' => 'users.updatemypassword', 'uses' => 'UsersController@updateMyPassword']);
        Route::get('/users/editpassword/{id}', ['as' => 'users.editpassword', 'uses' => 'UsersController@editPassword']);
        Route::patch('/users/editpassword/{id}', ['as' => 'users.updatepassword', 'uses' => 'UsersController@updatePassword']);
        Route::delete('/users/activate/{id}', ['as' => 'users.activate', 'uses' => 'UsersController@activate']);
        Route::delete('/users/deactivate/{id}', ['as' => 'users.deactivate', 'uses' => 'UsersController@deactivate']);
        Route::resource('/users', 'UsersController');
    });
    Route::delete('/categories/activate/{id}', ['as' => 'categories.activate', 'uses' => 'CategoriesController@activate']);
    Route::delete('/categories/deactivate/{id}', ['as' => 'categories.deactivate', 'uses' => 'CategoriesController@deactivate']);
    Route::resource('/categories', "CategoriesController");
    Route::delete('/photos/activate/{id}', ['as' => 'photos.activate', 'uses' => 'PhotosController@activate']);
    Route::delete('/photos/deactivate/{id}', ['as' => 'photos.deactivate', 'uses' => 'PhotosController@deactivate']);
    Route::resource('/photos', "PhotosController");
    Route::resource('/production','ProductionController');
    Route::resource('/product-types', 'ProductTypesController');
    Route::resource('/products', 'ProductsController');
    Route::get('/', 'HomeController@index')->name("main");
    Route::get('/minor', 'HomeController@minor')->name("minor");
});