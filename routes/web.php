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


Route::group(['middleware' => 'auth'], function () {


Route::get('/', function () {
return view('home');
});


Route::resource('sales', 'SalesController');
Route::resource('barang', 'BarangController');
Route::resource('outlet', 'OutletController');
Route::resource('survey', 'SurveyStockController');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');





