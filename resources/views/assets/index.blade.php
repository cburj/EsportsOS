@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>STREAM ASSETS</h1>
        <p>These are web-pages that can be embedded in live streams e.g. OBS/Xplit as a "Browser Source". Or just simply shown on screens at an event to present data/info to attendees.</p>
        <hr/>
        <h3>Tournament Bracket</h3>
        <a href="/assets/bracket" class="btn btn-dark">Launch</a>
        <hr/>
        <h3>Teams Standings</h3>
        <a href="/assets/teams" class="btn btn-dark">Launch</a>
        <hr/>
        <h3>Match Focus</h3>
        <a href="/assets/matchfocus" class="btn btn-dark">Launch</a>
        <hr/>
        <h3>Tournament Schedule</h3>
        <a href="/assets/schedule" class="btn btn-dark">Launch</a>
        <hr/>
    </div>

@endsection
