<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>BlockBuster DH</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Blockbuster DH
            </a>
        </nav>
    </header>
    <main class='container'>
        <br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Sinopse</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($filmes as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->sinopse}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>


    </main>
</body>

</html>
