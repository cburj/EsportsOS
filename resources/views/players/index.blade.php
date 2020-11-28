@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-10">
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
            <div class="col-sm">
                <!-- If user is logged in and is an admin, then show the button -->
                @if(!Auth::guest() && Auth::user()->isAdmin)
                    <h5>Admin Actions</h5>
                    <button type="button" class="btn btn-dark" onclick="location.href='/players/create'">Register Player</button>
                @endif
            </div>
          </div>
    </div>

@endsection
