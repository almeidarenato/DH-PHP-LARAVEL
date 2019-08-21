<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmeController extends Controller
{
    public function listandoFilmes()
    {
        $filmes = Filme::all();

        return view('listandoFilmes')->with('filmes', $filmes);
    }
    public function adicionandoFilmes()
    {
        return view('adicionandoFilmes');
    }
    public function salvandoFilmes(Request $request)
    {
        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200"
        ]);
        $filme = Filme::create([
            "titulo" => $request->input('titulo'),
            "sinopse" => $request->input('sinopse')
        ]);

        $filme->save();

        return redirect('/listandoFilmes');
    }
}
