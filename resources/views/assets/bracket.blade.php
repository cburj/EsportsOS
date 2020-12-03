@extends('layouts.assets')

@section('content')

<h1>BRACKET (⚠ Work-In-Progress!)</h1>
<!-- very basic for now, gonna need some good cs maths here -->
@foreach ($matches as $match)
    <h2>ID: {{ $match->id }}</h2>
    <h3>{{ $match->team1->name }}</h3>
    <h3>{{ $match->team2->name }}</h3>
    <h5>Child Match 1: {{ $match->child1_id }}</h5>
    <h5>Child Match 2: {{ $match->child2_id }}</h5>
    <hr/>
@endforeach

<!--


* Need to do some form of Level-Order-Traversal.
* But how do we find the root node? (aka the final match)


-->

@endsection

