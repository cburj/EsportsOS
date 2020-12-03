<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class AssetsController extends Controller
{
    public function bracket()
    {
        $matches = Match::all();
        return view('assets.bracket')->with('matches', $matches);
    }

    public function index()
    {
        return view('assets.index');
    }
}
