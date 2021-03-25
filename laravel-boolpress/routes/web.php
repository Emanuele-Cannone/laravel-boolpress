<?php

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

Route::get('/', 'HomeController@index')->name('guest-home');
Route::get('/posts', 'PostController@index')->name('guest.post.index'); // non faccio le resources perchè un utente non loggato non dovrà fare operazioni, ma solamente visualizzazione
Route::get('/posts/{id}', 'PostController@show')->name('guest.post.show'); // non faccio le resources perchè un utente non loggato non dovrà fare operazioni, ma solamente visualizzazione

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');
    });