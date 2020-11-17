@extends('layouts.app')

@section('content')

    <div class="container">
        @if (count($players) > 0)
            @foreach ($players as $player)
                <div class="card">
                    <div class="card-body">
                        <h3><a class="body-a" href="/players/{{ $player->id }}">{{ $player->username }}</a></h3>
                        <p>Team: <a class="body-a" href="/teams/{{ $player->team->id }}">{{ $player->team->name }}</a></p>
                    </div>
                </div>
                <hr />
            @endforeach
        @else
            <p>Oops, no players found 😢</p>
        @endif
    </div>

@endsection
