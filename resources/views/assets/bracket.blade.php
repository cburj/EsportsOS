@extends('layouts.assets')

@section('content')

<h1>BRACKETS:</h1>
<!-- very basic for now, gonna need some good cs maths here -->
@foreach ($matches as $match)
    <h2>ID: {{ $match->id }}</h2>
    <h3>{{ $match->team1->name }}</h3>
    <h3>{{ $match->team2->name }}</h3>
    <h5>Child Match: {{ $match->child_match_id }}</h5>
    <hr/>
@endforeach


@endsection
