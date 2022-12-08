<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <a href="{{route('series.create')}}" class="btn btn-light">ADICIONAR</a>
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset
    <ul>
        <table class="table">
            <thead>
              <tr>

                <th scope="col">NOME DA SÉRIE</th>
                <th>AÇÕES</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
              <tr>
                <td><a href="{{ route('temporadas.index', $serie->id) }}">{{$serie->nome}}</a></td>
                <td><a href="{{route('series.edit', $serie->id)}}" class="btn btn-info">Editar</a></td>
                <td>
                    <form action="{{route('series.destroy', $serie->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>


                </td>
              </tr>
              @endforeach
            </tbody>
          </table>


    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
