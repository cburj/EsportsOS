@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($matchups) > 0)
            <h3 class="">Action Required</h3>
            <div class="admin-matches-table">
                <table class="table admin-matches-table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Match ID</th>
                            <th scope="col">Team 1</th>
                            <th scope="col">Team 2</th>
                            <th scope="col">Score</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Match State</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matchups as $matchup)
                            <tr class="grey lighten-3">
                                @php
                                $dateString = $matchup->date_time;
                                $date = new DateTime($dateString);
                                @endphp

                                <th scope="row">{{ $matchup->id }}</th>
                                @if($matchup->team1_id != null)
                                    <td>{{ $matchup->team1->name }}</td>
                                @else
                                    <td>TBA</td>
                                @endif
                                @if($matchup->team2_id != null)
                                    <td>{{ $matchup->team2->name }}</td>
                                @else
                                    <td>TBA</td>
                                @endif
                                @if($matchup->team1_id != null && $matchup->team2_id != null)
                                    <td>{{ $matchup->team1_score }}:{{ $matchup->team2_score }}</td>
                                @else
                                    <td>N/A</td>
                                @endif

                                @if($matchup->date_time != null)
                                    <td>{{ $date->format('d/m/Y @ H:i') }}</td>
                                @else
                                    <td>TBA</td>
                                @endif
                                <td>{{ $matchup->state }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"
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
