<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barang', 'API\BarangAPIController@list');
Route::get('/barang/{id}', 'API\BarangAPIController@getById');
Route::post('/barang', 'API\BarangAPIController@create');
Route::put('/barang', 'API\BarangAPIController@update');
Route::delete('/barang/{id}', 'API\BarangAPIController@delete');

Route::get('/outlet', 'API\OutletAPIController@list');
Route::get('/outlet/{id}', 'API\OutletAPIController@getById');
Route::post('/outlet', 'API\OutletAPIController@create');
Route::put('/outlet', 'API\OutletAPIController@update');
Route::delete('/outlet/{id}', 'API\OutletAPIController@delete');
