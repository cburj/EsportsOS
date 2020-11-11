@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($teams) > 0)
            @foreach($teams as $team)
                <div class="well">
                    <h3>{{$team->name}}</h3>
                    <p>Country: {{$team->country}}</p>
                </div>
            @endforeach
        @else
            <p>Oops, no teams found 😢</p>
        @endif
    </div>

@endsection
