@extends('layouts.app')

@section('content')

    <div class="container">
        <x-match-card :matchup="$matchup" verbose="true"></x-match-card>
        <br>

        @if (!Auth::guest() && Auth::user()->isAdmin)

            <p>
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    🔽 Enter Score For Match 🔽
                </button>
            </p>

            <div class="collapse" id="collapseExample">
                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $matchup->id }}" name="id">

                    <p class="h4 mb-4 text-center">Submit Match Result</p>

                    <label for="team_1_score">{{ $matchup->team1->name }} Score:</label>
                    <input type="number" id="team_1_score" name="team_1_score" min="0" max="16">

                    <hr>

                    <label for="team_2_score">{{ $matchup->team2->name }} Score:</label>
                    <input type="number" id="team_2_score" name="team_2_score" min="0" max="16">

                    <hr>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Scoreboard Screenshot</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
                            <label class="custom-file-label" for="fileInput"></label>
                        </div>
                    </div>

                    <small id="helper" class="form-text text-muted mb-4">NOTE: You must upload a screenshot of the final
                        scoreboard for each match. This is so an admin can verify the score if a match result is disputed by
                        another team.</small>

                    <button class="btn btn-primary btn-block" type="submit" value="Submit">Save</button>
                </form>
            </div>
        @endif


    </div>
@endsection
