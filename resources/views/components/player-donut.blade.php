<div class="player-donut">
    <canvas id="{{$chartID}}" width="100" height="100"></canvas>
    <script>
        var ctx = document.getElementById('{{$chartID}}').getContext('2d');
        var {{$chartID}} = new Chart(ctx, {
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