@extends('layouts.assets')

@section('content')

    <h1 class="text-center">UPCOMING MATCHES</h1>
    <br>
    <div class="container text-center">
        @foreach ($matchups as $matchup)
        <div class="row">
            <div class="col schedule-team">
                <h4>{{$matchup->team1->name}}</h4>
            </div>
            <div class="col-1 schedule-vs schedule-team">
                <h4>VS</h4>
            </div>
            <div class="col schedule-team">
                <h4>{{$matchup->team2->name}}</h4>
            </div>
        </div>
        @php
            $dateString = $matchup->date_time;
            $date = new DateTime($dateString);
        @endphp
        <h4 class="schedule-time">Match Starts: {{ $date->format('d/m/Y @ H:i') }}</h4>
        <br>
        @endforeach
    </div>
@endsection

