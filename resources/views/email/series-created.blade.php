@component('mail::message')
    # {{$nomeSerie}} criada
    A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas e {{ $episodiosPorTemporada}} episódios.
    Acesse aqui.

@component('mail::button', ['url' => route('temporadas.index', $idSerie)])
        Ver Série
@endcomponent

@endcomponent
