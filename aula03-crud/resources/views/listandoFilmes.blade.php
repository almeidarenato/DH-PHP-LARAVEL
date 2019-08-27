@extends('layouts.master')

@section('title','Listando Filmes')

@section('content')
@if($filmes->isEmpty())
<section class="row">
        <header class="col-12">
            <h1 class="col-12 text-center">Não existem filmes disponíveis na plataforma</h1>
        </header>
    </section>
@else
<section class="row">
    <header class="col-12">
        <h1 class="col-12 text-center">Filmes</h1>
        <p class="col-12 d-block text-center"><b>listando todos os filmes da nossa plataforma digital</b></p>
    </header>
</section>
<section class="row">
    <article class="col-12">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Capa</th>
                    <th scope="col">Título</th>
                    <th colspan="col" scope="col">Sinopse</th>
                    <th colspan="2">Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach($filmes as $filme)
                <tr>
                    <td scope='row'>
                    <img src="{{$filme->imagem}}" width="80"height="80" alt="{{$filme->titulo}}">
                    </td>
                    <td scope="row">{{$filme->titulo}}</td>
                    <td colspan="row">{{$filme->sinopse}}</td>
                    <td><a href="/filmes/alterar/{{$filme->id}}"><i class="fas fa-edit" placeholder='Alterar'></i></a></td>
                    <td>
                            <a href='#' data-toggle="modal" data-target="#modal{{$filme->id}}">
                                    <i class="fas fa-trash" placeholder='Remover'></i>
                            </a>
                    </td>
                </tr>
                <!-- Modal -->
        <div class="modal fade" id="modal{{$filme->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Filme: {{$filme->titulo}}</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <form action="/filmes/remover/{{$filme->id}}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" >Excluir</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
                @endforeach
            </tbody>
        </table>
    </article>
</section>
    <div class="d-flex justify-content-center">
        {{ $filmes->links() }}
    </div>

@endif
@endsection
