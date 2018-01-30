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

Route::get('tableaubord', function () {
    return view('tableaubord');
});

// Routes pour les boissons
Route::get('boissons', 'BoissonsController@listeBoissons');
Route::get('boissons/{boisson}', 'BoissonsController@editBoissons')->name('editBoissons');
Route::get('triBoissons', 'BoissonsController@prixCroissant');
Route::get('addDrink', 'BoissonsController@addDrink');
Route::post('addDrink', 'BoissonsController@store');
// Route::get('boissons/{boisson}/ingredients', 'BoissonsController@addRecipe');
Route::get('modifyDrink/{boisson}', 'BoissonsController@modDrink')->name('modifyDrink');
Route::put('modifyDrink/{boisson}', 'BoissonsController@update');
Route::delete('boissons/{boisson}', 'BoissonsController@delete')->name('deleteDrink');

// Routes pour les Ingredients
Route::resource('ingredients', 'IngredientController');


// Routes pour les Ventes
Route::get('ventes', 'VentesController@listeVentes');


// Routes pour le Monnayeur
Route::get('monnayeur', 'MonnayeurController@coins');