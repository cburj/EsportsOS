@extends('layouts.assets')

@section('content')

    @php
    $player = $players[0];
    $team = $teams[0];
    @endphp

    <div class="player-focus">
        <div class="player-focus-name text-center">
            <br>
            <h4>{{ $player->username }} ({{ $team->name }})</h4>
            <br>
        </div>

        @if ($verbose == '1')
            <div class="player-focus-img text-center">
                <img src="/img/players/{{ $player->username }}.png" class="player-focus-img-pic"
                    onerror="this.onerror=null; this.src='/img/players/Default.png'" />
            </div>
            <hr>
        @endif
        
        <div class="player-focus-info">
            <h5>FULL NAME: {{ $player->full_name }}</h5>
            <h5>TWITTER: {{ $player->twitter }}</h5>
            <h5>Country: {{ $player->country }}</h5>
            <h5>WINS: {{ $player->wins }}</h5>
            <h5>LOSSES: {{ $player->losses }}</h5>
            <h5>DRAWS: {{ $player->draws }}</h5>
            <h5>RATING: {{ $player->rating }}</h5>
            <br>
        </div>
    </div>
@endsection
