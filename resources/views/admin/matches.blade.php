@extends('layouts.app')

@section('content')


    <!-- Central Modal Small -->
    <div class="modal fade" id="matchEvidence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">User-uploaded Evidence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video width="100%" autoplay controls>
                        <source src="https://i.imgur.com/EV5Tins.mp4" type="video/mp4">
                      </video>
                    <small>NOTE: This is a temporary placeholder for now. This is the way</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Central Modal Small -->


    <div class="container">
        @if (count($matchups) > 0)
            <h3 class="text-center">Matchup Issues</h3>

            <div class="admin-matches-table">
                <table class="table admin-matches-table">
                    <thead>
                        <tr>
                            <th scope="col">Match ID</th>
                            <th scope="col">Team 1</th>
                            <th scope="col">Team 2</th>
                            <th scope="col">Score</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Match State</th>
                            <th scope="col">Evidence</th>
                            <th scope="col">Mediate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matchups as $matchup)
                            <tr>
                                @php
                                $dateString = $matchup->date_time;
                                $date = new DateTime($dateString);
                                @endphp

                                <th scope="row">{{ $matchup->id }}</th>
                                <td>{{ $matchup->team1->name }}</td>
                                <td>{{ $matchup->team1->name }}</td>
                                <td>{{ $matchup->team1_score }}:{{ $matchup->team2_score }}</td>
                                <td>{{ $date->format('d/m/Y @ H:i') }}</td>
                                <td>{{ $matchup->state }}</td>
                                <td>
                                    <button class="btn btn-elegant btn-sm" type="button" data-toggle="modal"
                                        data-target="#matchEvidence">
                                        Evidence
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-elegant btn-sm"
                                        onclick="location.href='/matchups/{{ $matchup->id }}'">
                                        View Match
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3 class="text-center">No Matchup Issues</h3>
        @endif
    </div>
@endsection
