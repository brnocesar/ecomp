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

Route::post('criarEmpresa', 'API\EmpresaController@store');
Route::post('atualizarEmpresa', 'API\EmpresaController@update');
Route::post('deletarEmpresa', 'API\EmpresaController@destroy');
Route::post('removerGrupo', 'API\EmpresaController@removeGrupo');
Route::post('mostrarEmpresa', 'API\EmpresaController@show');
Route::post('listarEmpresas', 'API\EmpresaController@index');

Route::post('criarColaborador', 'API\ColaboradorController@store');
Route::post('atualizarColaborador', 'API\ColaboradorController@update');
Route::post('deletarColaborador', 'API\ColaboradorController@destroy');
Route::post('removerEmpresa', 'API\ColaboradorController@removeEmpresa');
Route::post('mostrarColaborador', 'API\ColaboradorController@show');
Route::post('listarColaboradores', 'API\ColaboradorController@index');

Route::post('criarSalario', 'API\SalarioController@store');
Route::post('atualizarSalario', 'API\SalarioController@update');
Route::post('deletarSalario', 'API\SalarioController@destroy');
Route::post('removerColaborador', 'API\SalarioController@removeColaborador');
Route::post('mostrarSalario', 'API\SalarioController@show');
