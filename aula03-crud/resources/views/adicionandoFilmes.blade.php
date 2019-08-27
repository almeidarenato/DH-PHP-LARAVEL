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
                  <option value=''></option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>

                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="exampleFormControlSelect1">Ator</label>
                <select class="form-control" name='ator'id="ator">
                  <option value=''></option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>
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
            <div class="form-group">
                <label for="exampleFormControlSelect1">Gênero</label>
                <select class="form-control" name='ator'id="ator">
                  <option value=''>1</option>
                  <option value=''>2</option>
                  <option value=''>3</option>
                  <option value=''>4</option>
                  <option value=''>5</option>
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
