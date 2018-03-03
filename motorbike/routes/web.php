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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('motors', 'MotorController', ['except' => [
    'edit', 'update', 'destroy',
]]);

Route::group(['perfix' => '/'], function () {
    Route::get('/', 'MotorSearchController@index');
    Route::get('search', 'MotorSearchController@search')->name('motors.search');
    Route::get('search/{motorbike}/show', 'MotorSearchController@show')->name('motors.show');
});
