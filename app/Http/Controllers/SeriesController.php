<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SerieRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository )
    {

    }

    public function index(Request $request) {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.listarseries')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create()
    {
        return view('series.create');
    }
    public function store( SeriesFormRequest $request)
    {

        $serie = $this->repository->add($request);
         return to_route('series.index')->with('mensagem.sucesso' , "Série '{$request->nome}' Adicionada com sucesso");
    }
    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!");
    }
    public function edit(Series $series, $id)
    {
        $dados = Series::find($id);
        return view('series.edit', compact('dados'));

    }
    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('series', $series )->with('mensagem.sucesso', "Série '{$series->nome}' editada com sucesso!");;
    }


}
