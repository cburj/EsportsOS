<div class="player-card player-card-{{$align}}">
    <h2>
        @if ($align == "left")
            <img src="/img/players/Default.png" class="img" style="width: 100px;"/>
        @endif
        {{$player->username}}
        @if ($align == "right")
            <img src="/img/players/Default.png" class="img" style="width: 100px;"/>
        @endif
    </h2>
</div>