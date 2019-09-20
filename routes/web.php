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


Auth::routes();
//redirection
Route::get('/', 'HomeController@RedirectToHomePage');

//CRUD
Route::post('/fhykdh6dF6degT5bbH230', 'HomeController@AjouterElement'); //Unknown URL
Route::get('/JKFdc8zdHUjd669efJJBzd', 'HomeController@RecupererElements'); //Unknown URL
Route::get('/JKFdc8zdHUjd669efJJBze', 'HomeController@RecupererElementsUpdate'); //Unknown URL
Route::put('/zdzdzd899Fefef55ZDf63z', 'HomeController@SupprimerElement'); //Unknown URL

//Changer Mot de Passe Ajax
Route::put('/kjdhh85GJJ36HGYDUD55eehK', 'HomeController@ChangerPasse'); //Unknown URL

//Decconexion Ajax
Route::post('/logout', 'HomeController@Deconnexion');

