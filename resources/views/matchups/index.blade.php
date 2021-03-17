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
            <p>Oops, no matches found 😢</p>
        @endif
    </div>
@endsection
