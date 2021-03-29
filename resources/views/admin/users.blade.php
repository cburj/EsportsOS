@extends('layouts.app')

@section('content')
    <div class="container">
        @if (!empty(session('successMessage')))
            <x-alert message="{{ session('successMessage') }}" type="success" dismiss="1"></x-alert>
        @endif
        <div class="row">
            <p class="animated flash text-center text-danger">WARNING: Making a user an administrator will give them all
                permissions you currently have.
                Please ensure the account details are correct before modifying their account type!</p>
            <div class="col-md">
                <h2>Administrators</h2>
                @foreach ($users as $user)
                    @if ($user->isAdmin == true)
                        <div class="border p-2">
                            <h4>{{ $user->name }} <i class="fas fa-check-circle text-primary"></i></h4>
                            <hr>
                            @php
                                $date = new DateTime($user->created_at);
                            @endphp
                            <p>Account Created at: {{ $date->format('d/m/Y') }}
                                ({{ $user->created_at->diffForHumans() }})</p>
                            <p>Email: {{ $user->email }}</p>
                            <form action="{{ route('admin.modify', $user->id) }}" method="post">
                                @method('POST')
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <input type="submit" value="Remove Admin" class="btn btn-danger btn-block btn-sm">
                            </form>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
            <div class="col-md">
                <h2>Standard Users</h2>
                @foreach ($users as $user)
                    @if ($user->isAdmin == false)
                        <div class="border p-2">
                            <h4>{{ $user->name }}</h4>
                            <hr>
                            @php
                                $date = new DateTime($user->created_at);
                            @endphp
                            <p>Account Created at: {{ $date->format('d/m/Y') }}
                                ({{ $user->created_at->diffForHumans() }})</p>
                            <p>Email: {{ $user->email }}</p>
                            <form action="{{ route('admin.modify', $user->id) }}" method="post">
                                @method('POST')
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <input type="submit" value="Make Admin" class="btn btn-success btn-block btn-sm">
                            </form>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
