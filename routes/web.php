<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
    $response = Http::get('https://pokeapi.co/api/v2/pokemon/');
    $response2 = Http::get('https://jsonplaceholder.typicode.com/users');





//return $response2->json();

   // json_encode
  // $obj = json_encode($response2);
  // $response = json_decode($response2);
   //print_r($obj);
    //return print_r($obj);
    //https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0

    $responsearray = $response->json();

    return view('welcome', compact('responsearray'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
