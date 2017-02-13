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


// HomePage
Route::get('/', ['uses' => 'PageController@home']);

// Redirect slug 'accueil' to '/'
Route::get('/accueil', function (){
	return redirect('/');
});

// Catch-all for Backpack/PageManager
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
     ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);


