@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Player Card Generator:</h1>


        <form action="" method="">
          @csrf
          <label for="team_id">Team:</label>
          <select class="form-control" id="team_id" name="team_id">
              <option value="" disabled selected>Select Team...</option>
          </select>
          <br>
          <label for="team_id">Player:</label>
          <select class="form-control" id="team_id" name="team_id">
            <option value="" disabled selected>Select Team...</option>
                  <!--<option value="Team1">Team1</option>-->
          </select>
          <br>
      </form>

      <script>

        var x = document.getElementById("team_id");
        var option = document.createElement("option");

        option.text = "Team1";

        x.add(option);

      </script>

    </div>

@endsection
