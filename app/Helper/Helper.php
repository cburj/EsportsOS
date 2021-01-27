<?php

namespace App\Helper;

use App\Models\Matchup;
use App\Models\Player;
use App\Models\Team;

class Helper
{
    /**
     * Used to check if a user is registered with a player and the
     * player is a part of either team1 or team2.
     */
    public static function checkUserTeam($user, $team1, $team2)
    {
        /**
         * 
         * Check if there is a player that points to this user.
         *  Get that players teamID, if that is equal to either of the two teams passed in.
         * 
         */

        $players = Player::all();
        foreach ($players as $player)
        {
            if ($player->user_id == $user)
            {
                if(
                    $player->team_id == $team1 ||
                    $player->team_id == $team2 )
                {
                    return true;
                }
                //At this point the player has been found and we know they aren't a part of team1 or team2,
                //so there is no point going any further in the loop.
                return false;
            }
        }
        //We have visited every player, but just incase, we return false!
        return false;
    }
}
