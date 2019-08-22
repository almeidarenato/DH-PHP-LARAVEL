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

        return redirect('/filmes');
    }
    public function alterandoFilme($id)
    {
        $filme = Filme::find($id);
        return view('adicionandoFilmes')->with('filme', $filme);
    }
    public function modificandoFilme(Request $request, $id)
    {
        $filme = Filme::find($id);
        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200"
        ]);

        $filme->titulo = $request->input('titulo');
        $filme->sinopse = $request->input('sinopse');
        $filme->save();

        return redirect('/filmes');
    }
    public function removendoFilme($id)
    {
        $filme = Filme::find($id);
        $filme->delete();
        return redirect('/filmes');
    }
}
