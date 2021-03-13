<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PlayersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_create_players()
    {
        $response = $this->get('/players/create')->assertRedirect('/players');
    }

    /** @test */
    public function admin_users_can_create_players()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));

        $response = $this->get('/players/create')->assertOk();
    }

    /** @test */
    public function a_player_can_be_created_via_the_form()
    {
        /**
         * This doesn't take the admin status of the user
         * into account, as the endpoint should only be
         * accessible via the form - which is secured via
         * admin checks.
         */

        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        //We need to make a team before we can make a player...
        $team = $this->post('/teams', [
            'name' => 'Team1',
            'abbreviation' => 'T1',
            'coach_name' => 'Unknown',
            'country' => 'United Kingdom',
            'twitter' => '@team1_esports',
            'primary_sponsor' => 'Sponsor #1',
            'secondary_sponsor' => 'Sponsor #2',
        ]);

        //Now make the player...
        $response = $this->post('/players', [
                'username' => 'Deckard',
                'full_name' => 'Rick Deckard',
                'country' => 'USA',
                'twitter' => '@ReplicantHunter',
                'discord' =>'deckard#2019',
                'team_id' => 1,
                'user_id' => 1,
                'wins' => 0,
                'losses' => 0,
                'draws' => 0,
                'rating' => 0.0
        ]);

        $this->assertCount(1, Player::all());
    }
}
