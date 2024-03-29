<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\Genero;
use App\Ator;

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
        $atores = Ator::all();
        $generos = Genero::all();
        $data = ['atores' => $atores, 'generos' => $generos];

        return view('adicionandoFilmes')->with($data);
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

        return redirect('/listandoFilmes');
    }
    public function alterandoFilme($id)
    {
        $filme = Filme::find($id);
        $atores = Ator::orderBy('nome', 'ASC')->get();
        $generos = Genero::orderBy('descricao', 'ASC')->get();
        $data = ['filme' => $filme, 'atores' => $atores, 'generos' => $generos];
        return view('adicionandoFilmes')->with($data);
    }
    public function modificandoFilme(Request $request, $id)
    {
        $filme = Filme::find($id);
        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200",
            "genero" => "required",
            "ator" => "required"

        ]);
        // salva imagem
        $arquivo = $request->file('imagem');
        $nomePasta = 'uploads';
        $arquivo->storePublicly($nomePasta);
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta";
        $nomeArquivo = $arquivo->getClientOriginalName();
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme->titulo = $request->input('titulo');
        $filme->sinopse = $request->input('sinopse');
        $filme->id_genero = $request->input('genero');
        $filme->id_protagonista = $request->input('ator');
        $filme->imagem = $caminhoRelativo;
        $filme->save();

        return redirect('/listandoFilmes');
    }
    public function removendoFilme($id)
    {
        $filme = Filme::find($id);
        $filme->delete();
        return redirect('/listandoFilmes');
    }
}
