<div>
    <div class="card">
        <div class="card-body">
            <h3 class="text-center"><strong><a class="body-a" href="/teams/{{ $team->id }}">{{ $team->name }} ({{ $team->abbreviation }})</a></strong></h3>
            <div class="row">
                <div class="col-sm-2">
                    <a class="" href="/teams/{{$team->id}}">
                        <img src="/img/teams/{{$team->name}}.png" class="img-thumbnail" onerror="this.onerror=null; this.src='/img/teams/Default.png'"/>
                    </a>
                </div>
                <div class="col-sm-8">
                    <strong>Players:</strong>
                    <p>
                        @foreach ($team->players as $player)
                            <a href="/players/{{ $player->id }}">{{ $player->username . ',' }}</a><br>
                        @endforeach
                    </p>
                </div>
              </div>
        </div>
    </div>
</div>
