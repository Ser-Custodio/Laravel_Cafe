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
Route::get('boissons', 'BoissonsController@listeBoissons')->name('triDrinks')->middleware('auth','role');
Route::get('triBoissons', 'BoissonsController@prixCroissant')->name('triPrix')->middleware('auth','role');

Route::get('boissons/{boisson}', 'BoissonsController@editBoissons')->name('editBoissons')->middleware('auth','role');
Route::get('addDrink', 'BoissonsController@addDrink')->middleware('auth','role');
Route::post('addDrink', 'BoissonsController@store')->middleware('auth','role');
Route::get('boissons/{boisson}/ingredients', 'BoissonsController@formRecipe')->name('formRecipe')->middleware('auth','role');
Route::post('boissons/{boisson}/ingredients', 'BoissonsController@addRecipe')->name('addRecipe')->middleware('auth','role');
Route::delete('boissons/{boisson}/ingredients', 'BoissonsController@deleteIng')->name('delIngRecipe')->middleware('auth','role');
Route::get('modifyDrink/{boisson}', 'BoissonsController@modDrink')->name('modifyDrink')->middleware('auth','role');
Route::put('modifyDrink/{boisson}', 'BoissonsController@update')->middleware('auth','role');
Route::delete('boissons/{boisson}', 'BoissonsController@delete')->name('deleteDrink')->middleware('auth','role');

// Routes pour les Ingredients
Route::resource('ingredients', 'IngredientController')->middleware(['auth','role']);

// Routes pour les Ventes
Route::resource('ventes', 'VenteController');
Route::post('ventes_search','VenteController@search')->name('search')->middleware(['auth','role']);

// Routes pour le Monnayeur
Route::get('monnayeur', 'moneyController@coins')->middleware('auth','role');

// Routes pour authentification
Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth','role');
Route::get('/', 'BoissonsController@listeBoissonsDispo')->name('machine');

//Routes pour utilisateurs
Route::resource('users', 'UserController');