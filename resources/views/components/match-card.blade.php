<div>
    <div class="card">
        <div class="card-body">
            @if($verbose == "true")
            <div class="matches-index-logos">
                <a href="/teams/{{ $matchup->team1->id }}">
                    <img src="/img/teams/{{ $matchup->team1->name }}.png" class="img-thumbnail float-left" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                </a>
                <a href="/teams/{{ $matchup->team2->id }}">
                    <img src="/img/teams/{{ $matchup->team2->name }}.png" class="img-thumbnail float-right" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                </a>
            </div>
            @endif
            <div class="text-center">
                <h3><strong>{{ $matchup->team1->name }} vs {{ $matchup->team2->name }}</strong></h3>
                @php
                $dateString = $matchup->date_time;
                $date = new DateTime($dateString);
                @endphp
                <p>Starts at: {{ $date->format('d/m/Y @ H:i') }}</p>
                <h2>{{ $matchup->team1_score }}:{{ $matchup->team2_score }}</h2>
                @php
                //Generate the URL for players to join the game.
                $ip = $matchup->server_ip;
                $conStr = "steam://connect/127.0.0.1/";
                @endphp
                <a href="" class="btn btn-primary" onclick="location.href='{{ $conStr }}'">
                    PLAYER JOIN
                </a>
            </div>
        </div>
    </div>
</div>