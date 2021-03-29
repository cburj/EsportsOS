@extends('layouts.assets')

@section('content')

<h1>BRACKET (⚠ Work-In-Progress!)</h1>

@php

function printMatchup($matchupRec)
{
    printMatchup($matchupRec->child1);
    printMatchup($matchupRec->child2);

    echo '' . $matchupRec->team1->name . ' VS ' . $matchupRec->team2->name . '';
}

@endphp


{{printMatchup($matchups[0])}}

@endsection

