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
                @if (count($matches) > 0)
                @foreach ($matches as $match)
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h5><strong>{{ $match->team1->name }} vs {{ $match->team2->name }}</strong></h5>
                                @php
                                $dateString = $match->date_time;
                                $date = new DateTime($dateString);
                                @endphp
                                <p>Starts at: {{ $date->format('d/m/Y @ H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    <hr />
                @endforeach
            @else
                <p>Oops, no matches found 😢</p>
            @endif
            </div>
        </div>
    </div>

@endsection
