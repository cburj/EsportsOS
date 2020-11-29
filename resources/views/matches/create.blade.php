@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create a Match</h1>
        <p>This should only be done if absolutely necessary - otherwise, use the match-autogenerate function (coming soon).</p>
        <div class="match-form">
            <form action="{{ route('matches.store') }}" method="POST">
                @csrf
                <label for="team1_id">Team1 ID:</label>
                <select class="form-control" id="team1_id" name="team1_id">
                    <option value="" disabled selected>Select Team 1...</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="team2_id">Team2 ID:</label>
                <select class="form-control" id="team2_id" name="team2_id">
                    <option value="" disabled selected>Select Team 2...</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="child_match_id">Child Match</label>
                <select class="form-control" id="child_match_id" name="child_match_id">
                    <option value="" disabled selected>Select A Child Match...</option>
                    @foreach ($matches as $match)
                        <option value="{{ $match->id }}">{{ $match->team1->name }} VS {{ $match->team2->name }}</option>
                    @endforeach
                </select>
                <br>
                
                <label for="date_time">Date/Time</label>
                <input type="datetime-local" id="date_time" name="date_time">

                <label for="server_ip">Game Server</label>
                <input type="text" name="server_ip"></input>
                <br>
                <hr/>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection