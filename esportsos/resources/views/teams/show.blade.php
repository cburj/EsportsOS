@extends('layouts.app')

@section('content')

    <div class="container">
        <h3><strong>{{$team->name}}</strong></h3>
        <p>Country: {{$team->country}}</p>
        <p>Coach: {{$team->coach_name}}</p>
        <p>Tournament Rating: {{$team->rating}}</p>
        <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{$team->twitter}}">{{$team->twitter}}</a></p>
        <p>Sponsor: {{$team->primary_sponsor}}</p>
        <p>Secondary Sponsor: {{$team->secondary_sponsor}}</p>

        <strong>Players:</strong>
        <p>
            @foreach ($team->players as $player)
                <a href="/players/{{ $player->id }}">{{ $player->username . ',' }}</a>
            @endforeach
        </p>

    </div>

@endsection
