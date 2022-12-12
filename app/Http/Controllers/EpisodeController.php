<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index( Season $season )
    {
         return view('episodes.index',compact('season'), ['episodes' => $season->episodes,
        'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }
    public function update(Request $request, Season $seasons)
    {
        $watchedEpisodes = $request->episodes; //todos os episodios que foram marcados no checkbox
        $seasons->episodes->each(function (Episode $episode) use ($watchedEpisodes){ //fará uma função para cada item da coleção
        $episode->watched = in_array($episode->id, $watchedEpisodes);   //se na requisição da linha 17, existir o id do epsodio que foi selecionado por meio da requisição $request->episode, return true
        });
        $seasons->push(); //adiciona valoras em um array
        return to_route('episodes.index', $seasons->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos!'); //retorna para view com o id salvo
     
    }
}
