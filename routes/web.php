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

Route::get('/write','CategoryController@index');
Route::post('/posts','ArticleController@store');


Route::resource('category', 'CategoryController');
Route::resource('article','ArticleController');


Route::get('/titles', 'titlesController@index');
Route::get('/titles/{title}', 'titlesController@show');