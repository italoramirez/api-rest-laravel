<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categoria', 'App\Http\Controllers\CategoriaController@getCategoria');
Route::get('categoria/{id}', 'App\Http\Controllers\CategoriaController@getCategoriaId');
Route::post('addCategoria', 'App\Http\Controllers\CategoriaController@insertCategoria');
Route::put('updateCategoria/{id}', 'App\Http\Controllers\CategoriaController@updateCategoria');
Route::delete('deleteCategoria/{id}', 'App\Http\Controllers\CategoriaController@deleteCategoria');

Route::get('/articles', 'App\Http\Controllers\ArticleController@index');
Route::post('/articles', 'App\Http\Controllers\ArticleController@store');
Route::put('/articles/{id}', 'App\Http\Controllers\ArticleController@update');
Route::delete('/articles/{id}', 'App\Http\Controllers\ArticleController@destroy');
