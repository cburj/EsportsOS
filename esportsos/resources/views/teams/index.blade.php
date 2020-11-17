@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($teams) > 0)
            @foreach($teams as $team)
                <div class="">
                <h3><strong><a class="body-a" href="/teams/{{$team->id}}">{{$team->name}} ({{$team->abbreviation}})</a></strong></h3>
                    <strong>Players:</strong>
                    <p>
                    @foreach ($team->players as $player)
                        {{$player->username. ','}}
                    @endforeach
                    <p>
                </div>
            <hr/>
            @endforeach
        @else
            <p>Oops, no teams found 😢</p>
        @endif
    </div>

@endsection
