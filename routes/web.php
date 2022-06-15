<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    $votes = DB::table('votes')->get();
    $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=1126');
    return view('welcome',['pokemon'=>$pokemon['results']],['votes' => $votes]);
});

Route::post('insert',[PokeController::class,'index'])->name('poke.index');

Route::get('/dashboard', function () {
    $votes = DB::table('votes')->get();
    $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=1126');
    return view('dashboard',['pokemon'=>$pokemon['results']],['votes' => $votes]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
