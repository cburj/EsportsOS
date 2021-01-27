@extends('layouts.app')

@section('content')

    <div class="container">
        <x-match-card :matchup="$matchup" verbose="true"></x-match-card>
        <br>

        @if (!Auth::guest() && Auth::user()->isAdmin)

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-elegant shadow-none" data-toggle="modal" data-target="#fullHeightModalRight">
                ADMIN Panel
            </button>

            <button class="btn btn-elegant shadow-none" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Enter Result
            </button>

            <div class="collapse" id="collapseExample">
                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="post">
                    @method('PUT')
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

        <!-- Full Height Modal Right -->
        <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-full-height modal-right" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">ADMIN PANEL</h4>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-success btn-block shadow-none">Confirm Result</button>
                        <br>
                        <button type="button" class="btn btn-danger btn-block shadow-none">Cancel Match</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Height Modal Right -->

    </div>
@endsection
