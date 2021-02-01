# "EsportsOS" (Working Title)
EsportsOS is designed to allow all sizes of esports tournaments to be organised in a few simple clicks, with the ability to record match results and rank teams/players based on their performances. EsportsOS also gives admins the ability to create several dashboards that can be used within livestreams/broadcasts to be shared data with viewers and attendees.

### Models
* User*
* Player
* Team
* Match

*Auto generated by Laravel.

### Controllers
* Users
* Players
* Teams
* Matchups
* Assets

### External API

Most data stored in the database tables will be accessible through an external API, meaning other processes/applications can request data. The &quot;EOS-API&quot; will accept all GET requests for matches, teams and players – but not return any personal data such as full names or passwords etc.

All GET Requests can be accessed using the following endpoints:

| Endpoint | Request Type | Description |
| --- | --- | --- |
| /api/status | GET | Returns the overall status of the system. |
| /api/teams | GET | Returns an array of all teams and their data. |
| /api/teams/{{team\_id}} | GET | Returns details for a specific team. |
| /api/matchups | GET | Returns an array of all matches and their data. |
| /api/matchups/{{matchup\_id}} | GET | Returns details for a specific match. |
| /api/players | GET | Returns an array of all players and their data – but not their personal data. |
| /api/players/{{player\_id}} | GET | Returns details for a specific player – but not their personal data. |


### Reusable Components

I have created a variety of reusable Laravel Components that can be used across the entire application. See the list below for more details:

* ALERT, Usage: ```<x-alert message="<<Your Alert Message>>" type="<<Bootstrap alert type e.g. danger>>" dismiss="<<If the alert can be dismissed e.g. 1 or 0>>"></x-alert>``` 
* TEAM-CARD, Usage: ```<x-team-card :team="<<team model>>"></x-team-card>```  
* MATCH-CARD, Usage: ```<x-match-card :matchup="<<matchup model>>" verbose="<<Show Team Logs e.g. true or false>>"></x-match-card>```
* PLAYER-DONUT, Usage: ```<x-player-donut :player="$player" chartID="test1"></x-player-donut>```   


### Matchup State Types:
| Value | Meaning |
| --- | --- |
| AWAITING RESULT | The match is either awaiting results, or hasn't started yet |
| VERIFYING RESULT | The result has been submitted and is waiting for an admin to verify them |
| RESULT DISPUTED | The result has been disputed by another player/team |
| RESULT CONFIRMED | Submitted results have been verified by an admin |
| MATCH CANCELLED | Match has been abandoned/cancelled by an admin |


<br>

### Match Evidence File Format:
"MATCH_X_EVIDENCE.PNG" (other extensions are allowed.)