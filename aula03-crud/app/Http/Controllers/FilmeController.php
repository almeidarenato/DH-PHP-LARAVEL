<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmeController extends Controller
{
    public function listandoFilmes()
    {
        //$filmes = Filme::all();
        $filmes = Filme::orderBy('id', 'ASC')->paginate(5);
        //$filmes = Filme::paginate(5);
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
            "sinopse" => "required|max:200",
            "genero" => "required",
            "ator" => "required"
        ]);

        $arquivo = $request->file('imagem');
        $nomePasta = 'uploads';
        $arquivo->storePublicly($nomePasta);
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta";
        $nomeArquivo = $arquivo->getClientOriginalName();
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme = Filme::create([
            "titulo" => $request->input('titulo'),
            "sinopse" => $request->input('sinopse'),
            "imagem" => $caminhoRelativo,
            "id_protagonista" => $request->input('ator'),
            "id_genero" => $request->input('genero')
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
