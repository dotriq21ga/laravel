<?php

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

Route::prefix('admin')->group(function() {
    Route::group(['prefix' => 'quan-ly-user', 'middleware' => ['auth','isAdmin']], function () {
        Route::get('/', 'AdminController@index');
        Route::get('/edit-user/{id}', 'AdminController@edit');
        Route::put('/update-user/{id}', 'AdminController@update')->name('update');
        Route::delete('/destroy-user/{id}', 'AdminController@destroy')->name('delete');
    });
});
