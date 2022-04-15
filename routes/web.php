<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
Route::get('/', [MenuController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/show/{id}',[ProductController::class, 'show'])->name('show');


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
        Route::get('/logout',[UserController::class, 'logout'])->name('logout');
        Route::get('/profile',[UserController::class, 'profile'])->name('profile');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function () {
        Route::get('/add',[MenuController::class, 'create']);
        Route::post('/add', [MenuController::class, 'store']);

        Route::get('/update/{id}',[MenuController::class, 'edit'])->name('get.update');
        Route::put('/update/{id}', [MenuController::class, 'update'])->name('post.update');

        Route::delete('/delete/{id}', [MenuController::class, 'detroy'])->name('post.delete');

        Route::get('/add_a', [ProductController::class, 'create'])->name('get.add_a');
        Route::post('/add_a', [ProductController::class, 'store'])->name('post.add_a');

        Route::get('/update_a/{id}', [ProductController::class, 'edit'])->name('get.update_a');
        Route::put('/update_a/{id}', [ProductController::class, 'update'])->name('post.update_a');

        Route::delete('/delete_a/{id}', [ProductController::class, 'detroy'])->name('post.delete_a');

        Route::put('/trans/{id}', [ProductController::class, 'trans'])->name('post.trans');
    });
});
