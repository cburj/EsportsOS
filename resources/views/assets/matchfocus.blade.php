@extends('layouts.assets')

@section('content')

@php
    $matchup = $matchups[0];
    $dateString = $matchup->date_time;
    $date = new DateTime($dateString);

    //dd($team1_players);

@endphp
        <div class="row">
          <div class="match-focus-25 d-flex align-items-center justify-content-center">
              <div class="">
                Team X Roster:
                @foreach ($team1_players as $t1p)
                    <x-player-card :player="$t1p"></x-player-card>
                @endforeach
              </div>
          </div>
          <div class="match-focus-50">
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
                <div class="matchFocusMain">
                    <h2>UPCOMING MATCH</h2>
                    <h1 class="asset-match-focus-teams"><img src="/img/teams/{{$matchup->team1->name}}.png" class=""/>VS<img src="/img/teams/{{$matchup->team2->name}}.png" class=""/></h1>
                    <h4>Starts at: {{ $date->format('d/m/Y @ H:i') }}</h4>
                </div>
              </div>
          </div>
          <div class="match-focus-25 d-flex align-items-center justify-content-center">
            <div class="">
              Team Y Roster:
              @foreach ($team2_players as $t2p)
                  <x-player-card :player="$t2p"></x-player-card>
              @endforeach
            </div>
        </div>
        </div>


@endsection

