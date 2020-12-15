@extends('layouts.app')

@section('content')

    <div class="container">
        @if(!empty(session('errorMessage')))
            <x-alert message="{{ session('errorMessage') }}" type="danger" dismiss="1"></x-alert>
        @endif
        
        <div class="row">
            <div class="col-10">
                @if (count($teams) > 0)
                    @foreach ($teams as $team)
                        <div class="card">
                            <div class="card-body">
                                <a href="/teams/{{$team->id}}">
                                    <img src="/img/teams/{{$team->name}}.png" class="img-thumbnail float-right" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                                </a>
                                <h3><strong><a class="body-a" href="/teams/{{ $team->id }}">{{ $team->name }} ({{ $team->abbreviation }})</a></strong></h3>
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
            <div class="col-sm">
                <!-- If user is logged in and is an admin, then show the button -->
                @if(!Auth::guest() && Auth::user()->isAdmin)
                    <h5>Admin Actions</h5>
                    <button type="button" class="btn btn-dark" onclick="location.href='/teams/create'">Register Team</button>
                @endif
            </div>
        </div>
    </div>

@endsection
