@extends('layouts.master')
@section('title','DH - Cadastro Filmes')
@section('content')
@if(Request::is('filmes/adicionar'))

 <h1>Cadastro de Filmes</h1>
        <form method='POST' action='/filmes/adicionar' enctype="multipart/form-data">
            @csrf
            {{ method_field('POST') }}
            <div class="form-group col-md-6 col-sm-12">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name='titulo'>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="sinopse">Sinopse</label>
                <input type="text" class="form-control" id="sinopse" name='sinopse'>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" id="imagem" name='imagem'>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="exampleFormControlSelect1">Gênero</label>
                <select class="form-control" name='genero' id='genero'>
                  <option value=''>Selecione um Gênero</option>
                  @foreach ($generos as $genero)
                <option value='{{$genero->id}}'>{{$genero->descricao}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="exampleFormControlSelect1">Ator</label>
                <select class="form-control" name='ator'id="ator">
                  <option value=''>Selecione um Ator</option>
                  @foreach ($atores as $ator)
                <option value='{{$ator->id}}'>{{$ator->nome}}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        @if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}} </li>
        @endforeach
    </ul>

</div>
@endif
@else
        <h1>Modificando Filmes </h1>
    <form method='POST' action='/filmes/alterar/{{$filme->id}}' enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name='titulo' value='{{$filme->titulo}}'>
            </div>
            <div class="form-group">
                <label for="sinopse">Sinopse</label>
            <input type="text" class="form-control" id="sinopse" name='sinopse' value='{{$filme->sinopse}}'>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name='imagem'>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                    <img class="img-fluid w-50" src="{{url($filme->imagem)}}" width="80"height="80" alt="{{$filme->titulo}}">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                    <label for="exampleFormControlSelect1">Gênero</label>
                    <select class="form-control" name='genero' id='genero'>
                    <option value='{{$filme->id_genero}}'>{{$generos[$filme->id_genero]->descricao}}</option>
                      @foreach ($generos as $genero)
                    <option value='{{$genero->id}}'>{{$genero->descricao}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                        <label for="exampleFormControlSelect1">Ator</label>
                        <select class="form-control" name='ator'id="ator">
                          <option value='{{$filme->id_protagonista}}'>{{$atores[$filme->id_protagonista]->nome}}</option>
                          @foreach ($atores as $ator)
                        <option value='{{$ator->id}}'>{{$ator->nome}}</option>
                          @endforeach
                        </select>
                </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}} </li>
        @endforeach
    </ul>

</div>
@endif
@endif
@endsection
