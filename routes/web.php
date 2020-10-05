<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');

    // return response()->json({1 => '2'});

    return response()->json(['name' => 'Abigail', 'state' => 'CA']);

});

Route::get('/discover', ['as' => 'discover', 'uses' => 'CatalogController@discover']);
Route::get('/trending', ['as' => 'trending', 'uses' => 'CatalogController@trending']);
Route::get('/movie/{id}', ['as' => 'movie', 'uses' => 'CatalogController@movie']);
Route::get('/genres', ['as' => 'genres', 'uses' => 'CatalogController@genres']);
