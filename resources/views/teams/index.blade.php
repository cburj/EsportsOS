@extends('layouts.app')

@section('content')

    <div class="container">
        @if(!empty(session('errorMessage')))
            <x-alert message="{{ session('errorMessage') }}" type="danger" dismiss="1"></x-alert>
        @endif

        <div class="row">
            <div class="col-10">
                @if (count($teams) > 0)
                    @foreach ($teams as $team)
                        <x-team-card :team="$team"></x-team-card>
                        <hr />
                    @endforeach
                @else
                    <p>Oops, no teams found 😢</p>
                @endif
            </div>
            <div class="col-sm">
                <!-- If user is logged in and is an admin, then show the button -->
                @if(!Auth::guest() && Auth::user()->isAdmin)
                    <h5>Admin Actions</h5>
                    <button type="button" class="btn btn-dark" onclick="location.href='/teams/create'">Register Team</button>
                @endif
            </div>
        </div>
    </div>

@endsection
