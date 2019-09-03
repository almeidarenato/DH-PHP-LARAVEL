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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tarefas-pendentes', 'TaskController@index');
Route::post('adicionar-tarefa', 'TaskController@create');
Route::post('concluir-tarefa/{id}', 'TaskController@done');
Route::post('excluir-tarefa/{id}', 'TaskController@delete');
