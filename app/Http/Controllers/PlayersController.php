<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use App\Models\Matchup;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::paginate(6);
        return view('players.index')->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() && Auth::user()->isAdmin)
        {
            //Import all of the required Teams/Users for dropdowns etc.
            $teams = Team::all();
            $users = User::all();
            return view('players.create')->with('teams', $teams)->with('users', $users);
        }
        else
        {
            return redirect('/players')->with('errorMessage', 'You must be logged in to perform this action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Validation */
        $this->validate($request, [
            'username' => 'required'
        ]);

        try {
            $player = Player::create([
                'username' => htmlspecialchars($request->username, ENT_QUOTES),
                'full_name' => htmlspecialchars($request->full_name, ENT_QUOTES),
                'country' => htmlspecialchars($request->country, ENT_QUOTES),
                'twitter' => htmlspecialchars($request->twitter, ENT_QUOTES),
                'discord' => htmlspecialchars($request->discord, ENT_QUOTES),
                'team_id' => $request->team_id,
                'user_id' => $request->user_id,
                'wins' => 0,
                'losses' => 0,
                'draws' => 0,
                'rating' => 0.0
            ]);
            return redirect('players/' . $player->id);
        } catch (QueryException $e) {
            return redirect('players/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);
        $matchups = Matchup::where('team1_id', $player->team_id)->orWhere('team2_id', $player->team_id)->get();
        return view('players.show')->with('player', $player)->with('matchups', $matchups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function api()
    {
        return Player::all();
    }
}
