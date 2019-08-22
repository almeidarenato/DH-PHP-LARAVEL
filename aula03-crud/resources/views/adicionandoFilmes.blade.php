@extends('layouts.master')
@section('title','DH - Cadastro Filmes')
@section('content')
@if(Request::is('filmes/adicionar'))

 <h1>Cadastro de Filmes</h1>
        <form method='POST' action='/filmes/adicionar'>
            @csrf
            {{ method_field('POST') }}
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name='titulo'>
            </div>
            <div class="form-group">
                <label for="sinopse">Sinopse</label>
                <input type="text" class="form-control" id="sinopse" name='sinopse'>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
@else
        <h1>Modificando Filmes </h1>
    <form method='POST' action='/filmes/alterar/{{$filme->id}}'>
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
