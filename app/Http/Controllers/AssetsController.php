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
        $matchups = Matchup::orderBy('date_time', 'ASC')->take(1)->get();
        $team1_players = Player::where('team_id', $matchups[0]->team1_id)->get();
        $team2_players = Player::where('team_id', $matchups[0]->team2_id)->get();
        return view('assets.matchfocus')->with('matchups', $matchups)->with('team1_players', $team1_players)->with('team2_players', $team2_players);
    }

    public function schedule()
    {
        $matchups = Matchup::where('date_time', '>=', date('Y-m-d H:i:s'))->orderBy('date_time', 'ASC')->take(6)->get();
        return view('assets.schedule')->with('matchups', $matchups);
    }

    public function player($id, $verbose)
    {
        $players = Player::where('id', $id)->take(1)->get();
        $teams = Team::where('id', $players[0]->team_id)->take(1)->get();
        return view('assets.player')->with('players', $players)->with('teams', $teams)->with('verbose', $verbose);
    }

    public function playerIndex()
    {
        $players = Player::select('id', 'team_id', 'username')->get();
        $teams = Team::select('name', 'id')->get();
        return view('assets.playerIndex')->with('players', $players)->with('teams', $teams);
    }

    public function countdown()
    {
        $matchup = Matchup::where('date_time', '>=', date('Y-m-d H:i:s'))->orderBy('date_time', 'ASC')->take(1)->get();
        return view('assets.countdown')->with('matchup', $matchup);
    }
}
