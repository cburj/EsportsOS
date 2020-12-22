<div class="player-card">
    <h2>{{$player->username}}</h2>
    <div class="row player-card-row">
    <div class="player-card-col">
        W: {{$player->wins}}
    </div>
    <div class="player-card-col">
        L: {{$player->losses}}
    </div>
    <div class="player-card-col">
        D: {{$player->draws}}
    </div>
    </div>
</div>