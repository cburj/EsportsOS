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
                                <img alt="success!" src="https://media.giphy.com/media/5VKbvrjxpVJCM/giphy.gif"/>
                            </div>
                        </div>
                        <!-- / Collapsible element -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Small -->

        <div class="row">
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
            <div class="col-md-4">
                <h3>Quick Actions</h3>

                <button class="btn btn-block btn-elegant" id="cburg-test" type="button" data-toggle="modal"
                    data-target="#centralModalSm">Generate Matches</button>

                <script type="text/javascript">
                    const sleep = (milliseconds) => {
                        return new Promise(resolve => setTimeout(resolve, milliseconds))
                    }

                    var buttonId = document.getElementById("cburg-test");
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
        </div>
    </div>
@endsection
