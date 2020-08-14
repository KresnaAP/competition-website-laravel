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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::post('user/store', ['as' => 'user.store', 'uses' => 'UserController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::post('user/update', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::post('user/password', ['as' => 'user.password', 'uses' => 'UserController@password']);
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
    Route::get('user/analytics', ['as' => 'user.analytics', 'uses' => 'UserController@analytics']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);
});

