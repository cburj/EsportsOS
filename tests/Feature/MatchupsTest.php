<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\User;
use App\Models\Team;
use App\Models\Matchup;
use Illuminate\Support\Facades\Log;

class MatchupsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function only_admin_users_can_create_matchups()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));
        $response = $this->get('matchups/create')->assertStatus(200);
    }

    /** @test */
    public function a_matchup_can_be_created_via_the_form()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));

        /**
         * Create two basic teams to populate the matchup with.
         */
        $this->createTeams();

        $response = $this->post('/matchups', [
            'team1_id' => Team::take(1)->first()->id,
            'team2_id' => Team::skip(1)->take(1)->first()->id,
            'child1_id' => null,
            'child2_id' => null,
            'date_time' => null,
            'server_ip' => '127.0.0.1',
        ]);

        $this->assertCount(1, Matchup::all());
    }

    /** @test */
    public function a_matchup_can_be_updated_via_a_form()
    {
        /**
         * Create all of our match data first.
         */
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));

        /**
         * Create two basic teams to populate the matchup with.
         */
        $this->createTeams();

        $response = $this->post('/matchups', [
            'team1_id' => Team::take(1)->first()->id,
            'team2_id' => Team::skip(1)->take(1)->first()->id,
            'child1_id' => null,
            'child2_id' => null,
            'date_time' => null,
            'server_ip' => '127.0.0.1',
        ]);
    }

    /** @test */
    public function only_admins_can_access_matchup_issues()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));
        $response = $this->get('/admin/match_issues')->assertStatus(200);
    }

    /** @test */
    public function non_admins_cannot_access_matchup_issues()
    {
        $response = $this->get('/admin/match_issues')->assertRedirect('/matchups');
    }

    /** @test */
    public function only_admins_can_access_matchups_dashboard()
    {
        $this->actingAs(User::factory()->create([
            'isAdmin' => 1
        ]));
        $response = $this->get('/admin/match_dashboard')->assertStatus(200);
    }

    /** @test */
    public function non_admins_cannot_access_matchup_dashboard()
    {
        $response = $this->get('/admin/match_dashboard')->assertRedirect('/matchups');
    }

    /**
     * A quick function to generate two teams for a matchup.
     */
    private function createTeams()
    {
        $this->post('/teams', [
            'name' => 'Team1',
            'abbreviation' => 'T1',
            'coach_name' => 'Unknown',
            'country' => 'United Kingdom',
            'twitter' => '@team1_esports',
            'primary_sponsor' => 'Sponsor #1',
            'secondary_sponsor' => 'Sponsor #2',
        ]);

        $this->post('/teams', [
            'name' => 'Team2',
            'abbreviation' => 'T2',
            'coach_name' => 'Unknown',
            'country' => 'United Kingdom',
            'twitter' => '@team2_esports',
            'primary_sponsor' => 'Sponsor #1',
            'secondary_sponsor' => 'Sponsor #2',
        ]);
    }
}
