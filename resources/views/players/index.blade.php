@extends('layouts.app')

@section('content')

    <div class="container">
        @if (!empty(session('errorMessage')))
            <x-alert message="{{ session('errorMessage') }}" type="danger" dismiss="1"></x-alert>
        @endif

        <div class="row">
            <div class="col-10">
                <h3>Players</h3>

                <div class="row row-cols-1 row-cols-md-3">
                    @if (count($players) > 0)
                        @foreach ($players as $player)
                            <div class="col mb-4">
                                <!-- Card -->
                                <div class="card">
                                    <!--Card image-->
                                    <div class="view overlay">
                                        <a class="" href="/players/{{ $player->id }}">
                                            <img class="card-img-top" src="/img/players/{{ $player->username }}.png"
                                                alt="Card image cap"
                                                onerror="this.onerror=null; this.src='/img/players/Default.png'">
                                        </a>
                                    </div>
                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <a href="/players/{{ $player->id }}">
                                            <h4 class="card-title">{{ $player->username }}</h4>
                                        </a>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text">Name: {{ $player->full_name }}</p>
                                        <p class="card-text">Team: <a href="/teams/{{ $player->team_id }}"
                                                class="no-decoration font-weight-bold">{{ $player->team->name }}</a></p>
                                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                        <a type="button" href="/players/{{ $player->id }}"
                                            class="btn btn-elegant btn-block">Profile</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                        @endforeach
                        <br>
                            {{ $players->links() }}
                        @else
                            <p>Oops, no players found 😢</p>
                    @endif
                </div>

            </div>
            <div class="col-sm">
                <!-- If user is logged in and is an admin, then show the button -->
                @if (!Auth::guest() && Auth::user()->isAdmin)
                    <h5>Admin Actions</h5>
                    <button type="button" class="btn btn-dark" onclick="location.href='/players/create'">Register Player</button>
                @endif
            </div>
        </div>
    </div>

@endsection
