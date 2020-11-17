@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($matches) > 0)
            @foreach($matches as $match)
                <div class="card">
                    <div class="card-body">
                        <h3><strong>{{$match->team1->name}} vs {{$match->team2->name}}</strong></h3>

                        @php
                            $dateString = $match->date_time;
                            $date = new DateTime($dateString);
                        @endphp
                        <p>Starts at: {{$date->format('d/m/Y @ H:i')}}</p>
                    </div>
                </div>
            <hr/>
            @endforeach
        @else
            <p>Oops, no matches found 😢</p>
        @endif
    </div>

@endsection
