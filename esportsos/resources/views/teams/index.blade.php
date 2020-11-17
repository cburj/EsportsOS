@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($teams) > 0)
            @foreach($teams as $team)
                <div class="">
                    <h3>{{$team->name}} ({{$team->abbreviation}})</h3>
                    <p>Country: {{$team->country}}</p>
                    <p>Coach: {{$team->coach_name}}</p>
                    <p>Tournament Rating: {{$team->rating}}</p>
                    <p>Twitter: <a href="https://www.twitter.com/{{$team->twitter}}">{{$team->twitter}}</a></p>
                    <p>Sponsor: {{$team->primary_sponsor}}</p>
                    <p>Seconday Sponsor: {{$team->secondary_sponsor}}</p>
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
