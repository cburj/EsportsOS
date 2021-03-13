<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_create_teams()
    {
        $response = $this->get('/teams/create')->assertRedirect('/teams');
    }

    /** @test */
    public function only_admin_users_can_create_teams()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));
        $response = $this->get('/teams/create')->assertStatus(200);
    }

    /** @test */
    public function a_team_can_be_created_via_the_form()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));

        $response = $this->post('/teams', [
            'name' => 'Team1',
            'abbreviation' => 'T1',
            'coach_name' => 'Unknown',
            'country' => 'United Kingdom',
            'twitter' => '@team1_esports',
            'primary_sponsor' => 'Sponsor #1',
            'secondary_sponsor' => 'Sponsor #2',
        ]);
        
        $this->assertCount(1, Team::all());

    }
}
