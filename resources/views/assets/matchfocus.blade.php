@extends('layouts.assets')

@section('content')

@php
    $matchup = $matchups[0];
    $dateString = $matchup->date_time;
    $date = new DateTime($dateString);
@endphp

    <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
        <div class="matchFocusMain">
            <h2>UPCOMING MATCH</h2>
            <h1 class="asset-match-focus-teams">{{$matchup->team1->name}} VS {{$matchup->team2->name}}</h1>
            <h4>Starts at: {{ $date->format('d/m/Y @ H:i') }}</h4>
        </div>
      </div>
@endsection

