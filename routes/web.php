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

Route::get('/', "SearchController@index");
Route::post('/search', "SearchController@search");
Route::get('/artists/{id}', "SearchController@artists");
Route::get('/tracks/{id}', "SearchController@tracks");
Route::get('/albums/{id}', "SearchController@albums");
Route::get('/login', 'UserController@login');
Route::get('/callback',  ['uses' => 'UserController@callback']);
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
