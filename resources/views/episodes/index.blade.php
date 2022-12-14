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
    }
  </style>
</head>
<body>
    <h1>Episódios da Temporada {{$season->number}}</h1>
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset
    <ul>
        <table class="table">
            <thead>
              <tr>


                <th>EPISÓDIOS</th>

              </tr>
            </thead>
            <tbody>
              <form method="post" action="{{route('episode.update', $season->id)}}">
                  @csrf
                  @foreach ($episodes as $ep)

                <tr>
                  <td>
                    <button class="btn btn-dark">{{$ep->number}} </button>
                  </td>
                  <td>
                    <input name="episodes[]" class="form-check-input mt-0" type="checkbox" value="{{$ep->id}}" aria-label="Checkbox for following text input"
                    @if ($ep->watched)
                      checked
                    @endif/>

                  </td>
                </tr>
                  @endforeach

            </tbody>
          </table>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>




    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
