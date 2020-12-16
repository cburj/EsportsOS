@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3><strong>{{ $team->name }}</strong></h3>
                <p>Country: {{ $team->country }}</p>
                <p>Coach: {{ $team->coach_name }}</p>
                <p>Tournament Rating: {{ $team->rating }}</p>
                <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{ $team->twitter }}">{{ $team->twitter }}</a>
                </p>
                <p>Sponsor: {{ $team->primary_sponsor }}</p>
                <p>Secondary Sponsor: {{ $team->secondary_sponsor }}</p>

                <strong>Players:</strong>
                <p>
                    @foreach ($team->players as $player)
                        <a href="/players/{{ $player->id }}">{{ $player->username . ',' }}</a>
                    @endforeach
                </p>
            </div>
            <div class="col-m">
                <h5><strong>Upcoming Matches</strong></h5>
                @if (count($matchups) > 0)
                @foreach ($matchups as $matchup)
                    <x-match-card :matchup="$matchup" verbose="false"></x-match-card>
                    <br>
                @endforeach
                @else
                    <p>Oops, no matches found 😢</p>
                @endif
            </div>
        </div>
    </div>

@endsection
