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

Route::get('/', function () {
    // "mysql:host=mysql;port=3307;dbname=motorbike", "root", "root", []
    // $myPDO = new \PDO('mysql:host=mysql;port=3306;dbname=motorbike', 'root', 'root', []);
    // dd($myPDO);

    return \App\User::all();
    // return view('welcome');
});
