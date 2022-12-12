<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      a {
      text-decoration: none;
      color: white;
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Series</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            @auth
            <a class="nav-link active" aria-current="page" href="{{'logout'}}">Logout</a>
            @endauth

          </li>
          <li class="nav-item">
            @guest
              <a class="nav-link" href="{{route('login')}}">Entrar</a>
            @endguest

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @auth
          <a href="{{route('series.create')}}" class="btn btn-light">ADICIONAR</a>
  @endauth
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
                @auth
                    <th>AÇÕES</th>
                @endauth


              </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
              <tr>
                <td>@auth
                    <a href="{{ route('temporadas.index', $serie->id) }}" style="list-style: none" type="button" class="btn btn-dark">{{$serie->nome}}@endauth</a>
                </td>
                @auth
                <td><a href="{{route('series.edit', $serie->id)}}" class="btn btn-info">Editar</a></td>

                    <td>
                    <form action="{{route('series.destroy', $serie->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>


                </td>
                @endauth

              </tr>
              @endforeach
            </tbody>
          </table>


    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
