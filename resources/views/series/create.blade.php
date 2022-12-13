<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .form-control {
            width: 300px;
        }
        form {
            position: relative;
            left: 40%;
        }
    </style>

</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif


    <form action="{{route('series.store')}}" method="post">
        <h1>Cadastrar Série</h1>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome: </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" >

            <div class="col-8">
                <label for="seasonQty" class="form-label">N° Temporadas: </label>
                <input type="text" class="form-control" id="seasonQty" aria-describedby="emailHelp" name="seasonQty" value="{{ old('seasonQty')}}" >
            </div>

            <div class="col-8">
                <label for="episodesPerSeason" class="form-label">Eps / Temporadas: </label>
                <input type="text" class="form-control" id="episodesPerSeason" aria-describedby="emailHelp" name="episodesPerSeason" value="{{ old('episodesPerSeason')}}">
            </div>


          </div>
        <input type="submit"  class="btn btn-primary">
        <a href="{{route('series.index')}}"><button type="button"  class="btn btn-warning">Ver Séries</button></a>


    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
