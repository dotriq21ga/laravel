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

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
    Route::get('/doc-tin-tuc/{id}', 'BlogController@show'); 
    Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function () {
        Route::get('/them-tin-tuc', 'BlogController@create');
        Route::post('/them-tin-tuc', 'BlogController@store')->name('them-tin-tuc');
        Route::get('/sua-tin-tuc/{id}', 'BlogController@edit');
        Route::put('/sua-tin-tuc/{id}', 'BlogController@update')->name('sua-tin-tuc');
        Route::delete('/xoa-tin-tuc/{id}', 'BlogController@destroy')->name('xoa-tin-tuc');
    });
});
