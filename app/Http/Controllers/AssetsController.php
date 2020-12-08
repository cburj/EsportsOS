<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Team;

class AssetsController extends Controller
{
    public function bracket()
    {
        $matches = Match::orderBy('id', 'ASC')->get();
        return view('assets.bracket')->with('matches', $matches);
    }

    public function teams()
    {
        $teams = Team::all();
        return view('assets.teams')->with('teams', $teams);
    }

    public function index()
    {
        return view('assets.index');
    }
}
