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
                <div class="row border rounded p-2">
                    <div class="col-md-4">
                        <img src="/img/players/{{ $player->username }}.png"
                            class="img-fluid img-thumbnail animated fadeIn slower"
                            onerror="this.onerror=null; this.src='/img/players/Default.png'" />
                    </div>
                    <div class="col-8">
                        <h3>{{ strtoupper($player->username) }}</h3>
                        <hr>
                        <p>Name: {{ $player->full_name }}</p>
                        <p>Country: {{ $player->country }}</p>
                        <p>Rating: {{ $player->rating }}</p>
                        @if ($player->twitter != null)
                            <a type="button" href="http://www.twitter.com/{{ $player->twitter }}"
                                class="btn btn-elegant float-right"><i class="fab fa-twitter"></i></a>
                        @endif
                    </div>
                </div>
                <br>
                <h3>Matches:</h3>
                <div class="row p-2">
                    <div class="col-md">
                        <h4>Complete</h4>
                        <table class="table">
                          <tbody>
                            <tr class="text-center">
                              <th>TeamX</th>
                              <td>(11:16)</td>
                              <td>TeamY</td>
                            </tr>
                            <tr class="text-center">
                              <th>TeamX</th>
                              <td>(16:5)</td>
                              <td>TeamA</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md">
                        <h4>Upcoming</h4>
                        <table class="table">
                          <tbody>
                            <tr class="text-center">
                              <th>TeamX</th>
                              <td>20:30 (GMT)</td>
                              <td>TeamY</td>
                            </tr>
                            <tr class="text-center">
                              <th>TeamX</th>
                              <td>22:15 (GMT)</td>
                              <td>TeamA</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h4>Statistics</h4>
                <x-player-donut :player="$player" chartID="test1"></x-player-donut>
            </div>
        </div>
    </div>
@endsection
