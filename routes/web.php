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
    return view('tableaubord');
})->middleware('auth');

Route::get('tableaubord', function () {
    return view('tableaubord');
})->middleware('auth');

// Routes pour les boissons
Route::get('boissons', 'BoissonsController@listeBoissons')->middleware('auth');
Route::get('boissons/{boisson}', 'BoissonsController@editBoissons')->name('editBoissons')->middleware('auth');
Route::get('triBoissons', 'BoissonsController@prixCroissant')->middleware('auth');
Route::get('addDrink', 'BoissonsController@addDrink')->middleware('auth');
Route::post('addDrink', 'BoissonsController@store')->middleware('auth');
Route::get('boissons/{boisson}/ingredients', 'BoissonsController@formRecipe')->name('formRecipe')->middleware('auth');
Route::post('boissons/{boisson}/ingredients', 'BoissonsController@addRecipe')->name('addRecipe')->middleware('auth');
Route::delete('boissons/{boisson}/ingredients', 'BoissonsController@deleteIng')->name('delIngRecipe')->middleware('auth');
Route::get('modifyDrink/{boisson}', 'BoissonsController@modDrink')->name('modifyDrink')->middleware('auth');
Route::put('modifyDrink/{boisson}', 'BoissonsController@update')->middleware('auth');
Route::delete('boissons/{boisson}', 'BoissonsController@delete')->name('deleteDrink')->middleware('auth');

// Routes pour les Ingredients
Route::resource('ingredients', 'IngredientController')->middleware('auth');


// Routes pour les Ventes
Route::resource('ventes', 'VenteController');


// Routes pour le Monnayeur
Route::get('monnayeur', 'MonnayeurController@coins')->middleware('auth');


// Routes pour authentification
Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/machine', 'BoissonsController@listeBoissonsDispo');