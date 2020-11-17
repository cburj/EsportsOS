@extends('layouts.app')

@section('content')

    <div class="container">
        @if (count($teams) > 0)
            @foreach ($teams as $team)
                <div class="card">
                    <div class="card-body">
                        <h3><strong><a class="body-a" href="/teams/{{ $team->id }}">{{ $team->name }}
                                    ({{ $team->abbreviation }})</a></strong></h3>
                        <strong>Players:</strong>
                        <p>
                            @foreach ($team->players as $player)
                                <a href="/players/{{ $player->id }}">{{ $player->username . ',' }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <hr />
            @endforeach
        @else
            <p>Oops, no teams found 😢</p>
        @endif
    </div>

@endsection
