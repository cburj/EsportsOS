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
        if(Auth::user())
            return view('teams.create');
        else
            return $this->index();
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
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'coach_name' => $request->coach_name,
            'country' => $request->country,
            'twitter' => $request->twitter,
            'primary_sponsor' => $request->primary_sponsor,
            'secondary_sponsor' => $request->secondary_sponsor,
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
