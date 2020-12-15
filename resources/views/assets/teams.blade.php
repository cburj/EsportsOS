@extends('layouts.assets')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Team</th>
        <th scope="col">Wins</th>
        <th scope="col">Losses</th>
        <th scope="col">Draws</th>
        <th scope="col">Rating</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teams as $team)
        <tr>
          <th>{{$team->name}}</th>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>{{$team->rating}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

