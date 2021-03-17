@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <h3 class="">Event Logs</h3>
                @if (empty($data['file']))
                    <h3 class="text-center">Whoops, there are no logs to display 😿</h3>
                @else
                    <div>
                        <pre>{{ $data['file'] }}</pre>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <form action="{{ route('logs') }}">
                    <input type="date" name="date" value="">
                    <button class="btn btn-block btn-elegant" type="submit">Get</button>
                </form>
            </div>

        </div>

    </div>
@endsection
