@extends('layouts.app')

@section('content')

    <div class="container">
        @if (!empty(session('errorMessage')))
            <x-alert message="{{ session('errorMessage') }}" type="danger" dismiss="1"></x-alert>
        @endif

        <div class="row">
            <div class="col-10">
                <h3>Players</h3>
                @if (count($players) > 0)
                    @foreach ($players as $player)
                        <div class="row border rounded p-2">
                            <div class="col-sm-2">
                                <a class="" href="/players/{{ $player->id }}">
                                    <img src="/img/players/{{$player->username}}.png" class="img-fluid animated fadeIn slower" onerror="this.onerror=null; this.src='/img/players/Default.png'"/>
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <a href="/players/{{ $player->id }}"><h4 class="font-weight-bold no-decoration">{{$player->username}}</h4></a>
                                <p>Name: {{$player->full_name}}</p>
                                <p>Team: <a href="/teams/{{$player->team_id}}" class="no-decoration font-weight-bold">{{$player->team->name}}</a></p>
                            </div>
                        </div>
                        <br>
                    @endforeach
                    {{ $players->links() }}
                @else
                    <p>Oops, no players found 😢</p>
                @endif

            </div>
            <div class="col-sm">
                <!-- If user is logged in and is an admin, then show the button -->
                @if (!Auth::guest() && Auth::user()->isAdmin)
                    <h5>Admin Actions</h5>
                    <button type="button" class="btn btn-dark" onclick="location.href='/players/create'">Register
                        Player</button>
                @endif
            </div>
        </div>
    </div>

@endsection
