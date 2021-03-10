<div>
    <div class="card shadow-none border">
        <div class="card-body">
            @if ($matchup->team1_id != null && $matchup->team2_id != null)
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

                    <p class="">STATUS: {{ $matchup->state }}</p>

                    @if ($endString != null)
                        <p>Finished at: {{ $end_date->format('d/m/Y @ H:i') }}</p>
                    @elseif($cur_date <= $date) <p>Starts at: {{ $date->format('d/m/Y @ H:i') }}</p>
                        @elseif($dateString == null)
                            <p>Unscheduled (TBD)</p>
                        @elseif($cur_date > $date)
                            <p>🔴Live</p>
                    @endif


                    <h2>{{ $matchup->team1_score }}:{{ $matchup->team2_score }}</h2>
                    @if ($matchup->state == 'RESULT DISPUTED')
                        <p><span class="red pl-5 pr-5 p-1 rounded-pill text-white"><i class="fas fa-exclamation"></i>
                                PENDING INVESTIGATION <i class="fas fa-exclamation"></i><span></p>
                    @endif
                    @php
                        //Generate the URL for players to join the game.
                        $ip = $matchup->server_ip;
                        $conStr = 'steam://connect/127.0.0.1/';
                    @endphp
                    <a href="" class="btn btn-elegant" onclick="location.href='{{ $conStr }}'">
                        <i class="fas fa-server pr-2"></i>JOIN SERVER
                    </a>
                </div>
            @else
                <div class="matches-index-logos">
                    <img src='/img/teams/Default.png' class="img-thumbnail float-right"/>
                    <img src='/img/teams/Default.png' class="img-thumbnail float-left"/>
                </div>
                <div class="text-center">
                    <h3>UNCONFIRMED MATCHUP*</h3>
                    @if(($matchup->child1->team1 != null) &&
                        ($matchup->child1->team2 != null) &&
                        ($matchup->child2->team1 != null) &&
                        ($matchup->child2->team2 != null))
                    <p><strong>{{$matchup->child1->team1->name}} or {{$matchup->child1->team2->name}}</strong></p>
                    <p>VS</p>
                    <p><strong>{{$matchup->child2->team1->name}} or {{$matchup->child2->team2->name}}</strong></p>
                    @else
                        <p><strong>Winner of <a href="/matchups/{{$matchup->child1->id}}">Match #{{$matchup->child1->id}}</a> VS Winner of <a href="/matchups/{{$matchup->child2->id}}">Match #{{$matchup->child2->id}}</a></strong></p>
                    @endif
                    <small>*The participants of this match are determined by the outcomes of matches which haven't yet been played.</small>
                </div>
            @endif
        </div>
    </div>
</div>
