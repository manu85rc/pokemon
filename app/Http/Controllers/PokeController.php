<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::insert('insert into votes (pokemon, user, vote) values (?, ?, ?)', [$request['pokemon'], $request['user'], 1]);
        return redirect('/dashboard');
    }

}
