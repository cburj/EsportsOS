@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3><strong>{{ $team->name }}</strong></h3>
                <p>Country: {{ $team->country }}</p>
                <p>Coach: {{ $team->coach_name }}</p>
                <p>Tournament Rating: {{ $team->rating }}</p>
                <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{ $team->twitter }}">{{ $team->twitter }}</a>
                </p>
                <p>Sponsor: {{ $team->primary_sponsor }}</p>
                <p>Secondary Sponsor: {{ $team->secondary_sponsor }}</p>

                <hr>
                <h2>Players:</h2>
                <p>
                    <div class="row row-cols-1 row-cols-md-3 text-center">
                    @foreach ($team->players as $player)
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
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    @endforeach
                    </div>
                </p>
            </div>
            <div class="col-m">
                <h5><strong>Upcoming Matches</strong></h5>
                @if (count($matchups) > 0)
                @foreach ($matchups as $matchup)
                    <x-match-card :matchup="$matchup" verbose="false"></x-match-card>
                    <br>
                @endforeach
                @else
                    <p>Oops, no matches found 😢</p>
                @endif

                <canvas id="chartID" width="100" height="100"></canvas>
                <script>
                    var ctx = document.getElementById('chartID').getContext('2d');
                    var chartID = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Match 1', 'Match 2', 'Match 3', 'Match 4', 'Match 5'],
                            datasets: [{
                                label: '',
                                data: [15, 2, 5, 1, 7],
                                backgroundColor: [
                                    'rgba(219, 219, 219, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(125, 125, 125, 1)'
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
            </div>
        </div>
    </div>
@endsection
