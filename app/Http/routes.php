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

Route::get('/', ['as'=>'articles',
	'uses'=>'LinkController@articles']);

Route::get('/about',['as'=>'apropos',
	'uses'=>'LinkController@about']);


Route::get('/connexion',['as'=>'connexion',
	'uses'=>'LinkController@connexion']);

Route::get('/admin',['as'=>'administrateur',
	'uses'=>'LinkController@admin']);



Route::post('/create', ['as' => 'createArticle',
	'uses' => 'LinkController@createArticle']);



// Pour l'enregistrement
Route::get('/register',['as'=>'register',
	'uses'=>'LinkController@register']);

Route::get('auth/register', [
	'as' => 'getRegister',
	'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', [
	'as' => 'postRegister',
	'uses' => 'Auth\AuthController@postRegister'
]);

//routes pour l'authentification

Route::get('/connexion',['as'=>'connexion',
	'uses'=>'LinkController@connexion']);
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

//Route de déconnexion
Route::get('auth/logout', 'Auth\AuthController@getLogout');