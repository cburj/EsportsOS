@extends('layouts.app')

@section('content')
    <div class="container">

        @if(!empty(session('errorMessage')))
            <x-alert message="{{ session('errorMessage') }}" type="danger" dismiss="1"></x-alert>
        @endif
        @if(!empty(session('successMessage')))
            <x-alert message="{{ session('successMessage') }}" type="success" dismiss="1"></x-alert>
        @endif
        @if(count($matchups) > 0)
            @foreach ($matchups as $matchup)
                <x-match-card :matchup="$matchup" verbose="true"></x-match-card>
                <hr />
            @endforeach
        @else
            <h3>Oops, no matches found 😢</h3>
            <p>Speak to an admin about generating matchups!</p>
        @endif
    </div>
@endsection
