# "EsportsOS" (Working Title)
EsportsOS is designed to allow all sizes of esports tournaments to be organised in a few simple clicks, with the ability to record match resutls and rank teams/players based on their performances. EsportsOS also gives admins the ability to create several dashboards that can be used within livestreams/broadcasts to shared data with viewers and attendees.


# Planned Endpoints
| Endpoint                  | Request Type | Description                                                                                                  |
|---------------------------|--------------|--------------------------------------------------------------------------------------------------------------|
| /api/status               | GET          | Returns the general status of the system.                                                                    |
| /api/teams                | GET          | Returns an array of all teams and their data.                                                                |
| /api/teams/{{team_id}}    | GET          | Returns details for the specified team.                                                                      |
| /api/matches              | GET          | Returns an array of all matches and their data.                                                              |
| /api/matches/{{match_id}} | GET          | Returns details for the specified match.                                                                     |
| /api/users                | GET          | Returns an array of all users who are marked as players. Event staff and general users will not be returned. |
| /api/users/{{user_id}}    | GET          | Returns details for a specific user (must be a player).                                                      |
