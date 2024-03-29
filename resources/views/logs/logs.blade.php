@extends('layouts.app')

@section('content')
    <div class="container">
                <h3 class="">Event Logs</h3>
                <hr>
                @if (empty($data['file']))
                    <h3 class="text-center">Whoops, there are no logs to display 😿</h3>
                @else
                    <div>
                        @foreach($data as $file)
                        <pre>{{print(nl2br($file, true))}}</pre>
                        @endforeach
                    </div>
                @endif
    </div>
@endsection
