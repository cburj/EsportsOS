@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Player</h1>
        <p>Create a record for a new player (must be linked to a registered user)</p>

        <div class="player-form">
            <form action="{{ route('players.store') }}" method="POST">
                @csrf
                <label for="username">Player Username:</label>
                <input type="text" name="username"></input>
                <br>
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name"></input>
                <br>
                <label for="country">Country:</label>
                <input type="text" name="country"></input>
                <br>
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter"></input>
                <br>
                <label for="discord">Discord:</label>
                <input type="text" name="discord"></input>
                <br>
                <!--<label for="team_id">TeamID:</label>
                <input type="text" name="team_id"></input>
                <br>
                <label for="user_id">UserID:</label>
                <input type="text" name="user_id"></input>
                <br>-->


                <label for="team_id">TeamID:</label>
                <select class="form-control" id="team_id" name="team_id">
                    <option value="" disabled selected>Select Team...</option>
                    @foreach ($teams as $team)
                        <!--<option value="hello world">{{$team->id}}</option>-->
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <br>

                <label for="user_id">UserID:</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="" disabled selected>Select User...</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
                <br>

                <input type="submit" value="Submit" class="btn btn-primary">

            </form>
        </div>

    </div>

@endsection
