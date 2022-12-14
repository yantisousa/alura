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
    <h1>Temporadas de {{$series->nome}}</h1>

    <ul>
        <table class="table">
            <thead>
              <tr>

                <th scope="col">TEMPORADAS</th>
                <th>EPISÓDIOS</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($seasons as $season)
              <tr>
                <td><button type="button" class="btn btn-dark"><a href="{{route('episodes.index', $season->id)}}"><b> {{ $season->number }}</b></a></button></td>


                    <td> <b>{{$season->numberOfWatchedEpisodes()}} / {{$season->episodes->count() }}</b></td>
              </tr>
                 @endforeach
            </tbody>
          </table>


    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
