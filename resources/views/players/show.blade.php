@extends('layouts.app')

@section('content')

<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <x-team-card :team="$player->team"></x-team-card>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3><strong>{{$player->username}}</strong></h3>
                <p>Name: {{$player->full_name}}</p>
        
                <p>Team: <a class="body-a" href="" data-toggle="modal" data-target="#teamModal">{{ $player->team->name }}</a></p>
                <p>Country: {{$player->country}}</p>
                <p>Twitter: <a class="body-a" href="https://www.twitter.com/{{$player->twitter}}">{{$player->twitter}}</a></p>
                <p>Discord: {{$player->discord}}</p>
                <p>Rating: {{$player->rating}}</p>
            </div>
            <div class="col-sm-4">
                <h4>Statistics</h4>
                <x-player-donut :player="$player" chartID="test1"></x-player-donut>
            </div>
          </div>
    </div>
@endsection
