<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blockbuster DH</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="30" height="30" class="d-inline-block mr-2" alt="Laravel">
                Blockbuster DH
            </a>
        </nav>
    </header>
    <main class="container my-5">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}} </li>
                @endforeach
            </ul>

        </div>
        @endif
        <form method='POST' action='/adicionandoFilmes'>
            @csrf
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
    </main>
</body>
</html>
