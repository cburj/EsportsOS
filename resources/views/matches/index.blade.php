@extends('layouts.app')

@section('content')

    <div class="container">
        @if (count($matches) > 0)
            @foreach ($matches as $match)
                <div class="card">
                    <div class="card-body">
                        <div class="matches-index-logos">
                            <a href="/teams/{{ $match->team1->id }}">
                                <img src="/img/teams/{{ $match->team1->name }}.png" class="img-thumbnail float-left" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                            </a>
                            <a href="/teams/{{ $match->team2->id }}">
                                <img src="/img/teams/{{ $match->team2->name }}.png" class="img-thumbnail float-right" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                            </a>
                        </div>
                        <div class="text-center">
                            <h3><strong>{{ $match->team1->name }} vs {{ $match->team2->name }}</strong></h3>
                            @php
                            $dateString = $match->date_time;
                            $date = new DateTime($dateString);
                            @endphp
                            <p>Starts at: {{ $date->format('d/m/Y @ H:i') }}</p>
                            <h2>{{ $match->team1_score }}:{{ $match->team2_score }}</h2>
                            @php
                            //Generate the URL for players to join the game.
                            $ip = $match->server_ip;
                            $conStr = "steam://connect/127.0.0.1/";
                            @endphp
                            <a href="" class="btn btn-primary" onclick="location.href='{{ $conStr }}'">
                                PLAYER JOIN
                            </a>
                        </div>
                    </div>
                </div>
                <hr />
            @endforeach
        @else
            <p>Oops, no matches found 😢</p>
        @endif
    </div>

@endsection
