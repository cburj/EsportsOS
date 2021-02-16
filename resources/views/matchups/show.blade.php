@extends('layouts.app')

@section('content')

    <div class="container">
        <x-match-card :matchup="$matchup" verbose="true"></x-match-card>
        <br>

        @if(!Auth::guest() && Auth::user()->isAdmin )
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger shadow-none" data-toggle="modal" data-target="#fullHeightModalRight">
                <i class="fas fa-tools"></i> ADMIN Panel
            </button>
        @endif

        <!--ALLOW A USER TO DISPUTE A RESULT -->
        @if (!Auth::guest() &&
        (Helper::checkUserTeam(Auth::user()->id, $matchup->team1_id, $matchup->team2_id)) &&
        $matchup->state == "VERIFYING RESULT")
            <button type="submit" form="dispute_result" value="submit" class="btn btn-danger shadow-none"><i class="fas fa-exclamation"></i> Dispute Result</button>
            <form class="" action="{{ route('matchups.update', $matchup->id) }}" method="post" id="dispute_result">
                @method('PUT')
                @csrf

                <input type="hidden" value="{{ $matchup->id }}" name="id">
                <input type="hidden" value="{{ $matchup->team1_score }}" name="team_1_score">
                <input type="hidden" value="{{ $matchup->team2_score }}" name="team_2_score">
                <input type="hidden" value="RESULT DISPUTED" name="state">
            </form>
        @endif

        @if($matchup->state != "AWAITING RESULT" && $matchup->state != "MATCH CANCELLED")
        <div class="modal fade" id="matchEvidence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">User-uploaded Evidence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <img src="/storage/matchup_evidence/MATCH_{{$matchup->id}}_EVIDENCE.png" class="img-fluid" alt="user uploaded match result evidence">
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-elegant shadow-none" type="button" data-toggle="modal" data-target="#matchEvidence">
            <i class="fas fa-image"></i> Evidence
        </button>
        <!-- Central Modal Small -->
        @endif()

        @if (!Auth::guest() &&
        (Helper::checkUserTeam(Auth::user()->id, $matchup->team1_id, $matchup->team2_id)) &&
        $matchup->state == "AWAITING RESULT")
            <button class="btn btn-elegant shadow-none" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-pencil-alt"></i> Enter Result
            </button>

            <div class="collapse" id="collapseExample">
                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="post" enctype="multipart/form-data">
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

                    <p>Match Evidence Screenshot:</p>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Screenshot</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="matchEvidenceImage" aria-describedby="fileInput" required />
                            <label class="custom-file-label" for="fileInput"></label>
                        </div>
                    </div>

                    <small id="helper" class="form-text text-muted mb-4">NOTE: You must upload a screenshot of the final
                        scoreboard for each match. This is so an admin can verify the score if a match result is disputed by
                        another team.</small>

                    <button class="btn btn-elegant btn-block" type="submit" value="Submit">Save</button>
                </form>
            </div>
        @endif

        <!-- ADMIN PANEL -->
        <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-full-height modal-right" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">ADMIN PANEL</h4>
                    </div>
                    <div class="modal-body">
                        <!--Check if we can enter a date time -->
                        @if($matchup->date_time == null)
                            <button class="btn btn-elegant btn-block shadow-none" type="button" data-toggle="collapse" data-target="#adminDateTime" aria-expanded="false" aria-controls="adminDateTime">
                            <i class="far fa-calendar-alt"></i> Set Match Date/Time
                            </button>
                            <div class="collapse" id="adminDateTime">
                                <form class="border p-5" action="{{ route('matchups.update', $matchup->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                
                                    <input type="hidden" value="{{ $matchup->id }}" name="id">

                                    <label for="date_time">Date/Time</label>
                                    <input class="form-control" type="datetime-local" id="date_time" name="date_time">
                
                                    <hr>
                                    <button class="btn btn-primary btn-block" type="submit" value="Submit">Save</button>
                                </form>
                                </div>
                                <hr>
                        @endif

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
                            <option value="RESULT CONFIRMED">RESULT CONFIRMED</option>
                            <option value="AWAITING RESULT">AWAITING RESULT</option>
                            <option value="VERIFYING RESULT">VERIFYING RESULT</option>
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
        <!-- ADMIN PANEL -->

        <hr>
        <h3 class="text-center"><strong>TeamX</strong></h3>
        <div class="match-additional-info-table">
            <table class="table table-striped">
                <thead class="elegant-color white-text">
                    <tr>
                        <th scope="col" class="elegant-color white-text">Player</th>
                        <th scope="col" class="elegant-color white-text">Rating</th>
                        <th scope="col" class="elegant-color white-text">Wins</th>
                        <th scope="col" class="elegant-color white-text">Losses</th>
                        <th scope="col" class="elegant-color white-text">Draws</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matchup->team1->players as $player)
                    <tr>
                        <td><a href="/players/{{$player->id}}" class="text-primary">{{ $player->username }}</a> ({{ $player->full_name }})</td>
                        <td>{{ $player->rating }}</td>
                        <td>{{ $player->wins }}</td>
                        <td>{{ $player->losses }}</td>
                        <td>{{ $player->draws }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <h3 class="text-center"><strong>TeamY</strong></h3>
        <div class="match-additional-info-table">
            <table class="table table-striped">
                <thead class="elegant-color white-text">
                    <tr>
                        <th scope="col" class="elegant-color white-text">Player</th>
                        <th scope="col" class="elegant-color white-text">Rating</th>
                        <th scope="col" class="elegant-color white-text">Wins</th>
                        <th scope="col" class="elegant-color white-text">Losses</th>
                        <th scope="col" class="elegant-color white-text">Draws</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matchup->team2->players as $player)
                    <tr>
                        <td><a href="/players/{{$player->id}}" class="text-primary">{{ $player->username }}</a> ({{ $player->full_name }})</td>
                        <td>{{ $player->rating }}</td>
                        <td>{{ $player->wins }}</td>
                        <td>{{ $player->losses }}</td>
                        <td>{{ $player->draws }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
