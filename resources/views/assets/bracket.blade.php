@extends('layouts.assets')

@section('content')

<h1>BRACKET (⚠ Work-In-Progress!)</h1>

@php
 
/**
 * @param array *$array
 * @param int $id
 * @return App\Models\Match
 * 
 * Function which is passed an array of matches, and then finds
 * a given match id in that array. The corresponding match
 * is returned, or NULL if no match ID was found.
 */
function findMatch($matches, $id)
{
    foreach($matches as $match)
    {
        if ($match->id == $id)
            return $match;
    }
    return null;
}

function printNode( $match, $matches )
{
    global $level;

    if( $match == null )
        return;

    echo '<h4>' . $match->team1->name . ' VS ' . $match->team2->name . '</h4>';
    echo '<br/>';

    $left = $match->child1_id;
    $right = $match->child1_id;

    printNode( findMatch( $matches, $left ), $matches );
    printNode( findMatch( $matches, $right ), $matches );
}

printNode($matches[0], $matches);

@endphp

@endsection

