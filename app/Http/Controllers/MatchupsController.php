<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Matchup;
use App\Models\Team;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use App\Helper\Helper;
use DateTime;
use App\Models\DisputeMessage;

class MatchupsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchups = Matchup::orderBy('date_time', 'ASC')->get();
        return view('matchups.index')->with('matchups', $matchups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            $teams = Team::all();
            $matchups = Matchup::get();
            return view('matchups.create')->with('matchups', $matchups)->with('teams', $teams);
        } else {
            return redirect('/matchups')->with('errorMessage', 'You must be logged in to perform this action.');
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

        $this->validate($request, [
            'team1_id' => 'required',
            'team2_id' => 'required'
        ]);

        $matchup = Matchup::create([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'child1_id' => $request->child1_id,
            'child2_id' => $request->child2_id,
            'date_time' => $request->date_time,
            'server_ip' => $request->server_ip
        ]);

        return redirect('matchups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('matchups.show', ['matchup' => Matchup::findOrFail($id)]);
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
     * Update the score/results for the current match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $matchup = Matchup::find($id);

            if($request->team_1_score != null)
                $matchup->team1_score = $request->team_1_score;

            if($request->team_2_score != null)
                $matchup->team2_score = $request->team_2_score;

            if ($request->state != null)
                $matchup->state = $request->state;

            if($request->date_time != null)
            {
                $timestamp = strtotime($request->date_time);
                $date_time = date("Y-m-d H:i:s", $timestamp);
                $matchup->date_time = $date_time;
            }

            if ($request->file('matchEvidenceImage') != null)
            {
                $file = $request->file('matchEvidenceImage');
                $extension = $file->extension();

                $newFileName = 'MATCH_' . $id . '_EVIDENCE.' . $extension;

                $path = $file->storeAs('public/matchup_evidence', $newFileName);

                //$file->storeAs('docs', $newFileName);
            }

            $matchup->save();
            return redirect('matchups/' . $id . '');
        } catch (QueryException $e) {
            return redirect('matchups/' . $id . '');
        }
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
        return Matchup::all();
    }

    public function adminMatchups()
    {
        $this->middleware('auth');
        $matchups = Matchup::where('state', 'RESULT DISPUTED')->orWhere('state', 'MATCH CANCELLED')->orWhere('state', 'VERIFYING RESULT')->orderBy('updated_at', 'ASC')->get();

        if (Auth::user()->isAdmin)
            return view('admin.matches')->with('matchups', $matchups);
        else
            return redirect('matchups');
    }

    public function dashboard()
    {
        return view('matchups.dashboard');
    }

    public function generateMatchups()
    {
        /**
         * NOTES:
         * if we have a number of team not equal to 2^0, 2^1, 2^2 etc, then
         * we need an alternate algorithm! For now, just working on a algorithm
         * for 2,4,8,16,24 etc.
         */
        //sleep(3);
        $status = "ERROR";

        $teams = Team::orderBy('rating', 'DESC')->get();
        $maxTeams = sizeof($teams) - 1;

        //Create maxTeams-1 blank matches
        for($i = 0; $i < ($maxTeams); $i++)
        {
            $match = Matchup::create([
                'team1_id' => null,
                'team2_id' => null,
                'child1_id' => null,
                'child2_id' => null,
                'date_time' => null,
                'start_time' => null,
                'end_time' => null,
                'team1_score' => 0,
                'team2_score' => 0,
                'server_ip' => '127.0.0.1',
                'state' => 'AWAITING RESULT'
            ]);
        }

        $bottomSeed = 0;
        $topSeed = $maxTeams-1;

        $matchups = Matchup::all();
        foreach($matchups as $matchup)
        {
            $matchup->team1_id = $teams[$bottomSeed];
            $matchup->team2_id = $teams[$topSeed];
            $matchup->save();
        }

        $status = $maxTeams . " ";
        $msg = "Matches Created ✅";
        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function refreshDisputeMessages(Request $request)
    {
        try
        {
            $timestamp = strtotime($request->last_request);
            $date_time = date("Y-m-d H:i:s", $timestamp);
            $messages = DisputeMessage::where('matchup_id', $request->matchup_id)->where('created_at', '>', $date_time)->get();
            return response()->json(array('messages' => $messages), 200);
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            return response()->json(array('status' => $exception->errorInfo), 200);
        }
    }
}
