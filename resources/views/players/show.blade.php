@extends('layouts.app')

@section('content')

<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <x-team-card :team="$player->team"></x-team-card>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3><strong>{{$player->username}}</strong></h3>
                <p>Name: {{$player->full_name}}</p>
        
                <p>Team: <a class="body-a" href="" data-toggle="modal" data-target="#teamModal">{{ $player->team->name }}</a></p>
                <p>Country: {{$player->country}}</p>
                <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{$player->twitter}}">{{$player->twitter}}</a></p>
                <p>Discord: {{$player->discord}}</p>
                <p>Rating: {{$player->rating}}</p>
            </div>
            <div class="col-sm-4">
                <h4>Statistics</h4>
                <div class="player-donut">
                    <canvas id="myChart" width="100" height="100"></canvas>
                </div>
            </div>
          </div>
        
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Wins', 'Losses', 'Draws'],
                datasets: [{
                    label: '',
                    data: [{{$player->wins}}, {{$player->losses}}, {{$player->draws}}],
                    backgroundColor: [
                        'rgba(244, 0, 53, 0.5)',
                        'rgba(26, 186, 255, 0.5)',
                        'rgba(0, 250, 201, 0.5)'
                    ],
                    borderColor: [
                        'rgba(244, 0, 53, 1)',
                        'rgba(26, 186, 255, 1)',
                        'rgba(0, 250, 201, 1)'
                    ],
                    borderWidth: 1
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

@endsection
