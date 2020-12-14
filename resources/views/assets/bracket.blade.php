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
function findMatch($matchups, $id)
{
    foreach($matchups as $matchup)
    {
        if ($matchup->id == $id)
            return $matchup;
    }
    return null;
}

function printNode( $matchup, $matchups, $level )
{

    if( $matchup == null )
        return;

    echo '<ul>';
    echo '<li class=" card bracket-card bracket-level-' . $level . ' ">';
    echo '<div class="card-body"><h5>' . $matchup->team1->name . '<div class="float-right">' . $matchup->team1_score . '</div></h5>';
    echo '<hr/>';
    echo '<h5>' . $matchup->team2->name . '<div class="float-right">' . $matchup->team2_score . '</div></h5>';
    echo '</div>';
    echo '</li>';
    echo '<br>';

    $left = $matchup->child1_id;
    $right = $matchup->child2_id;

    printNode( findMatch( $matchup, $left ), $matchups, $level+1 );
    printNode( findMatch( $matchup, $right ), $matchups, $level+1 );
    echo '</ul>';
}

echo '<div class="tree">';
printNode($matchups[0], $matchups, 1);
echo '</div>';

@endphp

@endsection

