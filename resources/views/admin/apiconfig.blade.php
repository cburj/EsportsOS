@extends('layouts.app')

@section('content')
    <div class="container">

        @if (!empty(session('successMessage')))
            <x-alert message="{{ session('successMessage') }}" type="success" dismiss="1"></x-alert>
        @endif

        <p>Once a token is generated, it will appear as a success message at the top of this page. <strong>It will not be show
            again.</strong> If a token is lost or forgotten, please regenerate a new one as soon as possible </p>


        <table class="table table-striped text-center">
            <thead class="black white-text">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">API Token</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }} @if($user->isAdmin)<i class="fas fa-check-circle text-primary"></i>@endif</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form class="" action="{{ route('api.generate') }}" method="POST"
                                id="user_update_{{ $user->id }}">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                            </form>
                            <button class="btn btn-sm btn-success" type="submit" form="user_update_{{ $user->id }}"
                                value="submit">
                                <i class="fas fa-key"></i>
                            @if ($user->api_token == null) Create Token @else
                                    Regenerate Token @endif
                            </button>

                            @if ($user->api_token != null)
                                <form class="" action="{{ route('api.revoke') }}" method="POST"
                                    id="user_revoke_{{ $user->id }}">
                                    @csrf
                                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                                </form>
                                <button class="btn btn-sm btn-danger" type="submit" form="user_revoke_{{ $user->id }}"
                                    value="submit">
                                    <i class="fas fa-key"></i> Revoke API Access
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
