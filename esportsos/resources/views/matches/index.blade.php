@extends('layouts.app')

@section('content')

    <div class="container">
        @if(count($matches) > 0)
            @foreach($matches as $match)
                <div class="">
                </div>
            <hr/>
            @endforeach
        @else
            <p>Oops, no matches found 😢</p>
        @endif
    </div>

@endsection
