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
// page de tous les articles
Route::get('/', ['as'=>'articles',
	'uses'=>'LinkController@articles']);
//page a propos
Route::get('/about',['as'=>'apropos',
	'uses'=>'LinkController@about']);

//pas de connexion
Route::get('/connexion',['as'=>'connexion',
	'uses'=>'LinkController@connexion']);

//Page pour écrire article
Route::get('/admin',['as'=>'administrateur',
	'uses'=>'LinkController@admin']);


//Création d'article
Route::post('/create', ['as' => 'createArticle',
	'uses' => 'LinkController@createArticle']);

//Page d'articles de l'utilisateur
Route::get('/articles/{name}',[
	'as'=>'articlesbyauthor',
	'uses'=>'LinkController@articlesbyauthor'
]);
//page d'un article via son id
Route::get('/article/{id}', [
	'as'=>'articlebyid',
	'uses'=>'LinkController@articlebyid'
]);

//Ecrire commentaire
Route::post('/comments', ['as' => 'comment',
	'uses' => 'LinkController@comment']);

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

//Suppression d'un article

Route::get('/delete/{id}',[
	'as'=>'deleteArticle',
	'uses'=>'LinkController@deleteArticle'
]);

//Modifiction d'un article

Route::match(['get', 'post'], '/update/{id}',[ //match car il peux y voir un get ou un post : get-> recuperer id de l'articles post -> lors de modification on recupere les modifications
	'as'=>'updateArticle',
	'uses'=>'LinkController@updateArticle']);

//routes pour l'authentification

Route::get('/connexion',['as'=>'connexion',
	'uses'=>'LinkController@connexion']);
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

//Route de déconnexion
Route::get('auth/logout', 'Auth\AuthController@getLogout');