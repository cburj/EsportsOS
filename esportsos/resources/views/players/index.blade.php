@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($players) > 0)
            @foreach($players as $player)
                <div class="">
                    <h3>{{$player->username}}</h3>
                    <p>Name: {{$player->full_name}}</p>
                    <p>Team: <a class="body-a" href="/teams/{{$player->team->id}}">{{$player->team->name}}</a></p>
                    <p>Country: {{$player->country}}</p>
                    <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{$player->twitter}}">{{$player->twitter}}</a></p>
                    <p>Discord: {{$player->discord}}</p>
                    <p>Rating: {{$player->rating}}</p>
                    <p>W/L/D Ratio: {{$player->wins}}:{{$player->losses}}:{{$player->draws}}</p>
                </div>
            <hr/>
            @endforeach
        @else
            <p>Oops, no players found 😢</p>
        @endif
    </div>

@endsection