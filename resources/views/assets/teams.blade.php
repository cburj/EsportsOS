@extends('layouts.assets')

@section('content')

<h1>TEAMS (⚠ Work-In-Progress!)</h1>


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
      <tr>
        <th>TeamX</th>
        <td>4</td>
        <td>2</td>
        <td>0</td>
        <td>2</td>
      </tr>
      <tr>
        <th>TeamY</th>
        <td>1</td>
        <td>3</td>
        <td>2</td>
        <td>0.2</td>
      </tr>
      <tr>
        <th>TeamZ</th>
        <td>0</td>
        <td>1</td>
        <td>5</td>
        <td>0</td>
      </tr>
    </tbody>
  </table>


@endsection

