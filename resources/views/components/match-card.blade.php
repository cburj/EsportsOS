<div>
    <div class="card shadow-none border">
        <div class="card-body">
            @if ($verbose == 'true')
                <div class="matches-index-logos">
                    <a href="/teams/{{ $matchup->team1->id }}">
                        <img src="/img/teams/{{ $matchup->team1->name }}.png" class="img-thumbnail float-left"
                            onerror="this.onerror=null; this.src='/img/teams/Default.png'" />
                    </a>
                    <a href="/teams/{{ $matchup->team2->id }}">
                        <img src="/img/teams/{{ $matchup->team2->name }}.png" class="img-thumbnail float-right"
                            onerror="this.onerror=null; this.src='/img/teams/Default.png'" />
                    </a>
                </div>
            @endif
            <div class="text-center">
                <a href="/matchups/{{ $matchup->id }}" class="matchup-link">
                    <h3><strong>{{ $matchup->team1->name }} vs {{ $matchup->team2->name }}</strong></h3>
                </a>
                @php
                $dateString = $matchup->date_time;
                $date = new DateTime($dateString);
                $cur_date = new DateTime();
                $endString = $matchup->end_time;
                $end_date = new DateTime($endString);
                @endphp

                <p>STATUS: {{ $matchup->state }}</p>

                @if ($endString != null)
                    <p>Finished at: {{ $end_date->format('d/m/Y @ H:i') }}</p>
                @elseif($cur_date <= $date)
                    <p>Starts at: {{ $date->format('d/m/Y @ H:i') }}</p>
                @elseif($cur_date > $date)
                        <p>🔴Live</p>
                @endif


                <h2>{{ $matchup->team1_score }}:{{ $matchup->team2_score }}</h2>
                @php
                //Generate the URL for players to join the game.
                $ip = $matchup->server_ip;
                $conStr = "steam://connect/127.0.0.1/";
                @endphp
                <a href="" class="btn btn-elegant" onclick="location.href='{{ $conStr }}'">
                    PLAYER JOIN
                </a>
            </div>
        </div>
    </div>
</div>
