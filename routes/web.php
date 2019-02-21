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
Route::get('/articles/approve/{token}', 'articlesController@approveArticle');
Route::get('/articles/reject/{token}', 'articlesController@rejectArticle');
Route::get('/articles/resend/{token}', 'articlesController@resendArticle');

Route::post('/articles/approve/{token}', 'articlesController@doApproveArticle');
Route::post('/articles/publish/{token}', 'publishController@doPublishArticle');
Route::post('/articles/reject/{token}', 'rejectController@doRejectArticle');
Route::post('/articles/resend/{token}', 'resentController@doResendArticle');


Route::get("/login", "adminController@loginPage");
Route::post("/login", "adminController@doLogin");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/members', 'adminController@maintenance');
Route::get('/members/active', 'adminController@maintenance');
Route::get('/members/newmember', 'adminController@maintenance');
Route::get('/members/diactivated', 'adminController@maintenance');
Route::get('/members/roles/new', 'adminController@maintenance');
Route::get('/members/roles', 'adminController@maintenance');


Route::get('/team', 'adminController@maintenance');
Route::get('/team/active', 'adminController@maintenance');
Route::get('/team/new', 'adminController@maintenance');
Route::get('/team/diactivated', 'adminController@maintenance');


Route::get('/news', 'adminController@maintenance');
Route::get('/news/new', 'adminController@maintenance');
Route::get('/news/diactivated', 'adminController@maintenance');


Route::get('/feedback', 'adminController@maintenance');
Route::get('/feedback/read', 'adminController@maintenance');
Route::get('/feedback/unread', 'adminController@maintenance');

Route::get('/harvest', 'adminController@maintenance');
Route::get('/analytics', 'adminController@maintenance');