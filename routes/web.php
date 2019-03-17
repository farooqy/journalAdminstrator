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

Route::get('/members', 'membersController@activeMembers');
Route::get('/members/active', 'membersController@activeMembers');
Route::get('/members/newmember', 'membersController@addNewMember');
Route::post('/members/newmember', 'membersController@saveNewMember');
Route::get('/members/diactivated', 'membersController@showDeactivatedMembers');
Route::get('/member/deactivate/{memberId}', 'membersController@deactivateMember');
Route::get('/member/activate/{memberId}', 'membersController@activateMember');


Route::get('/members/roles/new', 'membersController@addNewRole');
Route::post('/members/roles/new', 'membersController@saveNewRole');
Route::get('/members/roles', 'membersController@viewExistingRoles');
Route::get('/members/roles/{roleId}', 'membersController@viewMembersInGivenRole');
Route::get('/members/roles/deactivate/{roleId}', 'membersController@deactivateRole');
Route::get('/members/roles/activate/{roleId}', 'membersController@activateRole');
Route::post('/members/role/index', 'membersController@getRoleIndex');


Route::get('/team', 'adminController@maintenance');
Route::get('/team/active', 'adminController@maintenance');
Route::get('/team/new', 'adminController@maintenance');
Route::get('/team/diactivated', 'adminController@maintenance');


Route::get('/news', 'newsController@showNewsList');
Route::get('/news/new', 'newsController@showEditor');
Route::post('/news/new', 'newsController@saveNews');
Route::get('/news/diactivate', 'newsController@showNewsList');
Route::get('/news/deletenew/{newsId}', 'newsController@markNewsInactive');


Route::get('/feedback', 'adminController@maintenance');
Route::get('/feedback/read', 'adminController@maintenance');
Route::get('/feedback/unread', 'adminController@maintenance');

Route::get('/harvest', 'adminController@maintenance');
Route::get('/analytics', 'adminController@maintenance');