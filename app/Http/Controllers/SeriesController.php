<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(private EloquentSeriesRepository $repository )
    {

    }

    public function index() {
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

        $userList = User::all();
        foreach($userList as $user){
             $email = new SeriesCreated(
            $serie->nome,
            $serie->id,
            $request->seasonQty,
            $request->episodesPerSeason,
        );
        Mail::to($user)->queue($email);

        }

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
