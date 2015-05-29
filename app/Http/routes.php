<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('{section}/{uri}', 'PostArticleController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'], function()
{
	Route::get('', [
		'as' => 'admin', 'uses' => 'Article\ArticleController@index'
	]);

	Route::get('section/{sectionId}', [
		'as' => 'admin.article.list', 'uses' => 'Article\ArticleController@index'
	]);

	Route::group(['prefix' => 'article'], function()
	{
		Route::get('edit/{sectionId}/{id?}', [
			'as' => 'admin.article.edit', 'uses' => 'Article\ArticleController@edit'
		]);
		Route::post('save', [
			'as' => 'admin.article.save', 'uses' => 'Article\ArticleController@save'
		]);
		Route::get('remove/{sectionId}/{id?}', [
			'as' => 'admin.article.remove', 'uses' => 'Article\ArticleController@remove'
		]);
	});
});