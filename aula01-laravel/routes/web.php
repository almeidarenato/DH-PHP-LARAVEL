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

Route::get('/teste', function () {
    $nome = "Renato";
    return view('teste')->with("nome", $nome);
});

Route::get('/testando/{nome}/{sobrenome}/{email}', function ($nome, $sobrenome, $email) {
    return "Olá $nome $sobrenome. Seu e-mail é $email .";
});


Route::get('/testando/{numero}/{opcional?}', function ($numero, $opcional = null) {
    return (empty($opcional)) ? ($numero % 2 == 0 ? "par" : "impar") : $numero * $opcional;
});

Route::get('/tabuada/{numero}', function ($numero) {
    $tabuada = '';
    $multiplica = 0;
    for ($i = 0; $i <= 10; $i++) {
        $multiplica = $i * $numero;
        $tabuada = $tabuada . $i . '*' . $numero . ' = ' . $multiplica . "\n";
    }
    return $tabuada;
});
Route::get('/contatos', "ContatoController@index");
