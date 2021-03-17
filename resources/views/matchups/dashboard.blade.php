@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Central Modal Small -->
        <div class="modal fade" data-keyboard="false" data-backdrop="static" id="centralModalSm" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="msg">🕖 Generating Match Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="spinner-border" role="status" id="spinner">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <!-- Collapsible element -->
                        <div class="collapse" id="collapseExample">
                            <div class="mt-3" id="success-img">
                                <img alt="success!" src="https://media.giphy.com/media/5VKbvrjxpVJCM/giphy.gif" />
                            </div>
                        </div>
                        <!-- / Collapsible element -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Small -->

        <!-- Event Timings Modal -->
        <div class="modal fade" id="modalEventTimings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Set Event Timings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <p>EsportOS can quickly generate rough match timings based on the information, you provide below. These can easily be tweaked from the admin panel on each match's details screen!</p>
                        <hr>
                        
                        <form class="" action="{{ route('matchups.generateTimings') }}" method="POST">
                            @csrf
                            <label for="date_time">Earliest Match Start Time</label>
                            <input class="" type="datetime-local" id="date_time" name="date_time" required>
                            <label for="matchDuration">Average Match Duration (Minutes)</label>
                            <input class="" type="number" id="matchDuration" name="matchDuration" step="10" required>
                            <label for="breakDuration">Break Between Rounds (Minutes)</label>
                            <input class="" type="number" id="breakDuration" name="breakDuration" step="5" required>

                            <hr>
                            <input type="submit" value="Generate" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Timings Modal -->

        <div class="row">
            <div class="col-md-4">
                <h3>Quick Actions</h3>

                <button class="btn btn-block btn-elegant" id="generate-matches" type="button" data-toggle="modal"
                    data-target="#centralModalSm">Generate Matches</button>

                <br>

                <button class="btn btn-block btn-elegant" id="set-event-timing" type="button" data-toggle="modal"
                    data-target="#modalEventTimings">Set Event Timings</button>

                <script type="text/javascript">
                    const sleep = (milliseconds) => {
                        return new Promise(resolve => setTimeout(resolve, milliseconds))
                    }

                    var buttonId = document.getElementById("generate-matches");
                    buttonId.onclick = function() {

                        $.ajax({
                            type: 'POST',
                            url: '/generateMatches',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                var output = data.status + ": " + data.msg;
                                $("#msg").html(output);
                                document.getElementById("spinner").style.visibility = "hidden";
                                $("#collapseExample").collapse();

                                sleep(2000).then(() => {
                                    $("#msg").html("Refreshing Feed...");
                                    $('#centralModalSm').modal('hide');
                                    window.location.replace("/matchups");
                                })
                            }
                        });

                    }

                </script>

                <br>
                <br>
            </div>
            <div class="col-md-8">
                <h3>Matchup Dashboard</h3>
                <canvas id="myChart" style=""></canvas>
                <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                            datasets: [{
                                label: 'Match Performance KPI',
                                data: [12, 19, 3, 5, 2, 3],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
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
                <div class="row">
                    <div class="col-md-6">
                        <h4>Matchups</h4>
                        <ul>
                            <li>Total Matches: 7</li>
                            <li>Upcoming Matches: 3</li>
                            <li>Completed Matches: 4</li>
                            <li>Predicted Final Time: 14:00</li>
                            <li>Predicted Winner: TeamX</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Players</h4>
                        <ul>
                            <li>Registered Players: 20</li>
                            <li>Top Rated: Deckard</li>
                            <li>Lowest Rated: Gaff</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
