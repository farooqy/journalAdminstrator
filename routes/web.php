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


Route::get('/', 'articlesController@index');

Route::get('/articles', 'articlesController@topublish');
Route::get('/articles/topublish', 'articlesController@topublish');
Route::get('/articles/toapprove', 'articlesController@toApprove');
Route::get('/articles/resent', 'articlesController@resent');
Route::get('/articles/rejected', 'articlesController@rejected');
Route::get('/articles/{token}', 'articlesController@viewArticle');
Route::get('/articles/publish/{token}', 'articlesController@publishArticle');


Route::get("/login", "adminController@loginPage");
Route::post("/login", "adminController@doLogin");
