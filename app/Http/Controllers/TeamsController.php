<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Models\Matchup;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user() && Auth::user()->isAdmin)
            return view('teams.create');
        else
            return redirect('/teams')->with('errorMessage', 'You must be logged in to perform this action.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        try
        { 
        $team = Team::create([
            'name' => htmlspecialchars($request->name, ENT_QUOTES),
            'abbreviation' => htmlspecialchars($request->abbreviation, ENT_QUOTES),
            'coach_name' => htmlspecialchars($request->coach_name, ENT_QUOTES),
            'country' => htmlspecialchars($request->country, ENT_QUOTES),
            'twitter' => htmlspecialchars($request->twitter, ENT_QUOTES),
            'primary_sponsor' => htmlspecialchars($request->primary_sponsor, ENT_QUOTES),
            'secondary_sponsor' => htmlspecialchars($request->secondary_sponsor, ENT_QUOTES),
        ]);

        //Redirect to this new Record.
        return redirect('teams/' . $team->id);
        }
        catch(QueryException $e)
        {
            //For now, just redirect to the page.
            return redirect('teams/create');
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
        $matchups = Matchup::where('team1_id', $id)->orWhere('team2_id', $id)->get();
        return view('teams.show', ['team' => Team::findOrFail($id)])->with('matchups', $matchups);
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
        return Team::all();
    }
}
