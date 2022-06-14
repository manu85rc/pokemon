<?php

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
    $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=1126');
    return view('welcome',['pokemon'=>$pokemon['results']]);
});

Route::get('/dashboard', function () {
    $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=1126');
    return view('dashboard',['pokemon'=>$pokemon['results']]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
