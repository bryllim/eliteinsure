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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/newsalesrep', 'HomeController@newsalesrep')->name('newsalesrep');
Route::get('/createpayroll', 'HomeController@createpayroll')->name('createpayroll');

Route::post('/newpayroll', 'HomeController@newpayroll')->name('newpayroll');

Route::post('/addsalesrep', 'HomeController@addsalesrep')->name('addsalesrep');




Route::post('/newActivity', 'ActivityController@newActivity')->name('newActivity');
Route::get('/joinActivity/{id}', 'ActivityController@joinActivity')->name('joinActivity');
Route::post('/sponsorActivity/{id}', 'ActivityController@sponsorActivity')->name('sponsorActivity');
Route::get('/viewActivity/{id}', 'ActivityController@viewActivity')->name('viewActivity');
