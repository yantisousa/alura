<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Models\Series;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit']);
Route::get('/series/edit/{id}', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('/series/update/{series}', [SeriesController::class, 'update'])->name('series.update');

Route::get('/series/{series}/seasons', [TemporadasController::class, 'index'])->name('temporadas.index');
Route::get('season/{season}', [EpisodeController::class, 'index'])->name('episodes.index');
Route::post('/season/{seasons}', [EpisodeController::class, 'update'])->name('episode.update');
