@extends('layouts.assets')

@section('content')
    <div class="vertical-center text-center">
        <div class="container countdownContainer">
            @if (count($matchup) == 0)
                <h1>No Upcoming Matches</h1>
            @else
                <h1 class="countdownBanner"><img class="" src="/img/teams/{{$matchup[0]->team1->name}}.png" class=""/>VS<img class="" src="/img/teams/{{$matchup[0]->team2->name}}.png" class=""/></h1>
                <br>
                @php
                    $date_time = $matchup[0]->date_time;
                @endphp
                <h4>NEXT MATCH STARTS AT:</h4>
                @php
                    $date = new DateTime($date_time);
                @endphp
                <h1 class="countdownClock">{{ $date->format('h:i a') }} (GMT)</h1>
                <br>
                <h1 class="countdownClock" id="countdown"></h1>
                <script>
                    // Set the date we're counting down to
                    var countDownDate = new Date(" {{ $date_time }} ").getTime();
                    // Update the count down every 1 second
                    var x = setInterval(function() {
                        // Get today's date and time
                        var now = new Date().getTime();
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        // Display the result in the element with id="demo"
                        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                            minutes + "m " + seconds + "s ";
                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("countdown").innerHTML = "🔴 Match is Live!";
                        }
                    }, 1000);

                </script>
            @endif
        </div>
    </div>
@endsection
