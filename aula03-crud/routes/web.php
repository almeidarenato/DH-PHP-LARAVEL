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

Route::get('/listandoFilmes', 'FilmeController@listandoFilmes');

//Adicionando Filmes
Route::get('/filmes/adicionar', 'FilmeController@adicionandoFilmes');
Route::post('/filmes/adicionar', 'FilmeController@salvandoFilmes');

//Alterar Filme
Route::get('/filmes/alterar/{id}', 'FilmeController@alterandoFilme');
Route::put('/filmes/alterar/{id}', 'FilmeController@modificandoFilme');

//Removendo Filme
Route::delete('/filmes/remover/{id}', 'FilmeController@removendoFilme');
