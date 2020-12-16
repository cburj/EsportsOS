<div>
    <div class="card">
        <div class="card-body">
            <a href="/teams/{{$team->id}}">
                <img src="/img/teams/{{$team->name}}.png" class="img-thumbnail float-right" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
            </a>
            <h3><strong><a class="body-a" href="/teams/{{ $team->id }}">{{ $team->name }} ({{ $team->abbreviation }})</a></strong></h3>
            <strong>Players:</strong>
            <p>
                @foreach ($team->players as $player)
                    <a href="/players/{{ $player->id }}">{{ $player->username . ',' }}</a>
                @endforeach
            </p>
        </div>
    </div>
</div>
