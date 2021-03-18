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
                        @foreach($data as $file)
                            {{print(nl2br($file, true))}}
                        @endforeach
                        <pre></pre>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <form action="{{ route('logs') }}">
                    <input type="date" name="date" value="">
                    <button class="btn btn-block btn-elegant">Get</button>
                </form>
            </div>
        </div>
    </div>
@endsection
