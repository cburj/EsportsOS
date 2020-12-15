<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matchup;
use App\Models\Team;

class AssetsController extends Controller
{
    public function bracket()
    {
        $matchups = Matchup::orderBy('id', 'ASC')->get();
        return view('assets.bracket')->with('matchups', $matchups);
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

    public function matchFocus()
    {
        $matchups = Matchup::take(1)->get();
        return view('assets.matchfocus')->with('matchups', $matchups);
    }
}
