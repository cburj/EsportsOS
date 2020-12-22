<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matchup;
use App\Models\Team;
use App\Models\Player;

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
        $team1_players = Player::where('team_id', $matchups[0]->team1_id)->get();
        $team2_players = Player::where('team_id', $matchups[0]->team2_id)->get();
        return view('assets.matchfocus')->with('matchups', $matchups)->with('team1_players', $team1_players)->with('team2_players', $team2_players);
    }
}
