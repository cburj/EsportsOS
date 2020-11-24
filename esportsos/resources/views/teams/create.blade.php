@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Team</h1>
        <p>Create a record for a new Team</p>
        <div class="team-form">
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <label for="name">Team Name:</label>
                <input type="text" name="name"></input>
                <br>
                <label for="abbreviation">Abbreviation:</label>
                <input type="text" name="abbreviation"></input>
                <br>
                <label for="coach_name">Coach:</label>
                <input type="text" name="coach_name"></input>
                <br>
                <label for="country">Country:</label>
                <input type="text" name="country"></input>
                <br>
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter"></input>
                <br>
                <label for="primary_sponsor">Primary Sponsor:</label>
                <input type="text" name="primary_sponsor"></input>
                <br>
                <label for="seconday_sponsor">Secondary Sponsor:</label>
                <input type="text" name="seconday_sponsor"></input>
                <br>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection