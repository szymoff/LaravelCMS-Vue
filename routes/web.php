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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// Pages
	Route::resource('pages','PagesController');
	Route::get('pages', ['as' => 'pages.index', 'uses' => 'PagesController@index']);
	Route::get('pages/{page}', [ 'as' => 'pages.show', 'uses' => 'PagesController@show' ]);
	Route::get('pages/{page}/edit', [ 'as' => 'pages.edit', 'uses' => 'PagesController@edit' ]);
	Route::get('pages/create', ['as' => 'pages.create', 'uses' => 'PagesController@create']);
	Route::post('pages/save', ['as' => 'pages.save', 'uses' => 'PagesController@save']);
	Route::post('pages/{page}', ['as' => 'pages.update', 'uses' => 'PagesController@update']);
	Route::post('pages/{page}', ['as' => 'pages.destroy', 'uses' => 'PagesController@destroy']);
});

