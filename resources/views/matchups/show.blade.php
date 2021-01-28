@extends('layouts.app')

@section('content')

    <div class="container">
        <x-match-card :matchup="$matchup" verbose="true"></x-match-card>
        <br>


        @if(!Auth::guest() && Auth::user()->isAdmin )
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-elegant shadow-none" data-toggle="modal" data-target="#fullHeightModalRight">
                <i class="fas fa-tools"></i> ADMIN Panel
            </button>
        @endif


        @if (!Auth::guest() &&
        (Helper::checkUserTeam(Auth::user()->id, $matchup->team1_id, $matchup->team2_id)) &&
        $matchup->state == "AWAITING RESULT")
            <button class="btn btn-elegant shadow-none" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-pencil-alt"></i> Enter Result
            </button>

            <div class="collapse" id="collapseExample">
                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="post">
                    @method('PUT')
                    @csrf

                    <input type="hidden" value="{{ $matchup->id }}" name="id">
                    <input type="hidden" value="VERIFYING RESULT" name="state">

                    <p class="h4 mb-4 text-center">Submit Match Result</p>

                    <label for="team_1_score">{{ $matchup->team1->name }} Score:</label>
                    <input type="number" id="team_1_score" name="team_1_score" min="0" max="16" value="0">

                    <hr>

                    <label for="team_2_score">{{ $matchup->team2->name }} Score:</label>
                    <input type="number" id="team_2_score" name="team_2_score" min="0" max="16" value="0">

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


                        <button class="btn btn-elegant btn-block shadow-none" type="button" data-toggle="collapse" data-target="#adminOverride"
                aria-expanded="false" aria-controls="adminOverride">
                <i class="fas fa-edit"></i> Override Result
            </button>

            <div class="collapse" id="adminOverride">
                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="post">
                    @method('PUT')
                    @csrf

                    <input type="hidden" value="{{ $matchup->id }}" name="id">

                    <p class="h4 mb-4 text-center">Submit Match Result</p>

                    <label for="state">Match State:</label>
                    <select class="form-control" id="state" name="state">
                        <option value="" disabled selected>Select State...</option>
                            <option value="AWAITING RESULT">AWAITING RESULT</option>
                            <option value="VERIFYING RESULT">VERIFYING RESULT</option>
                            <option value="RESULT CONFIRMED">RESULT CONFIRMED</option>
                            <option value="RESULT DISPUTED">RESULT DISPUTED</option>
                            <option value="MATCH CANCELLED">MATCH CANCELLED</option>
                    </select>

                    <hr>

                    <label for="team_1_score">{{ $matchup->team1->name }} Score:</label>
                    <input type="number" id="team_1_score" name="team_1_score" min="0" max="16" value="{{$matchup->team1_score}}">

                    <hr>

                    <label for="team_2_score">{{ $matchup->team2->name }} Score:</label>
                    <input type="number" id="team_2_score" name="team_2_score" min="0" max="16" value="{{$matchup->team2_score}}">

                    <hr>

                    <button class="btn btn-primary btn-block" type="submit" value="Submit">Save</button>
                </form>
            </div>


                        <hr>

                        <form class="" action="{{ route('matchups.update', $matchup->id) }}" method="post" id="confirm_result">
                            @method('PUT')
                            @csrf
        
                            <input type="hidden" value="{{ $matchup->id }}" name="id">
                            <input type="hidden" value="{{ $matchup->team1_score }}" name="team_1_score">
                            <input type="hidden" value="{{ $matchup->team2_score }}" name="team_2_score">
                            <input type="hidden" value="RESULT CONFIRMED" name="state">
                        </form>
                        <button type="submit" form="confirm_result" value="submit" class="btn btn-success btn-block shadow-none"><i class="fas fa-check"></i> Confirm Result</button>
                        <br>

                        <form class="" action="{{ route('matchups.update', $matchup->id) }}" method="post" id="cancel_match">
                            @method('PUT')
                            @csrf
        
                            <input type="hidden" value="{{ $matchup->id }}" name="id">
                            <input type="hidden" value="0" name="team_1_score">
                            <input type="hidden" value="0" name="team_2_score">
                            <input type="hidden" value="MATCH CANCELLED" name="state">
                        </form>
                        <button type="submit" form="cancel_match" value="submit" class="btn btn-danger btn-block shadow-none"><i class="fas fa-times"></i> Cancel Match</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Height Modal Right -->

    </div>
@endsection
