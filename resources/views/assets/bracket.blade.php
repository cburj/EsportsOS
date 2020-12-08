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

function printNode( $match, $matches, $level )
{

    if( $match == null )
        return;

    echo '<ul>';
    echo '<li class=" card bracket-card bracket-level-' . $level . ' ">';
    echo '<div class="card-body"><h5>' . $match->team1->name . '<div class="float-right">' . $match->team1_score . '</div></h5>';
    echo '<hr/>';
    echo '<h5>' . $match->team2->name . '<div class="float-right">' . $match->team2_score . '</div></h5>';
    echo '</div>';
    echo '</li>';
    echo '<br>';

    $left = $match->child1_id;
    $right = $match->child2_id;

    printNode( findMatch( $matches, $left ), $matches, $level+1 );
    printNode( findMatch( $matches, $right ), $matches, $level+1 );
    echo '</ul>';
}

echo '<div class="tree">';
printNode($matches[0], $matches, 1);
echo '</div>';

@endphp

@endsection

