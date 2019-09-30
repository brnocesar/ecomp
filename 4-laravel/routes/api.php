<?php

use Illuminate\Http\Request;

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

Route::post('criarGrupo', 'API\GrupoController@store');
Route::post('atualizarGrupo', 'API\GrupoController@update');
Route::post('deletarGrupo', 'API\GrupoController@destroy');
Route::post('mostrarGrupo', 'API\GrupoController@show');
Route::post('listarGrupos', 'API\GrupoController@index');
