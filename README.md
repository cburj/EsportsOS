# "EsportsOS" (Working Title)
EsportsOS is designed to allow all sizes of esports tournaments to be organised in a few simple clicks, with the ability to record match resutls and rank teams/players based on their performances. EsportsOS also gives admins the ability to create several dashboards that can be used within livestreams/broadcasts to shared data with viewers and attendees.

###Models
* User*
* Player
* Team
* Match

*Auto generated by Laravel.

###Controllers
* Users
* Players
* Teams
* Matches

###Database Tables

**Users (Default Laravel Table)**

| **Attribute Name** | **Type** | **Key** | **Description** |
| --- | --- | --- | --- |
| id | Bigint(20) | PK | Unique Integer ID for each user – generated by Laravel on account creation. |
| name | Varchar(255) || Name of the user. |
| email | Varchar(255) || Email address used to create the account. |
| email\_verified\_at | Timestamp || Time when the account was verified by email. |
| password | Varchar(255) || Hashed password generate when the user creates their account. |
| two\_factor\_secret | Text || Secret used in the 2FA Process |
| two\_factor\_recovery\_codes | Text || Recovery Codes required to reset 2FA |
| remember\_token | Varchar(100) || Used to counteract &quot;cookie hijacking&quot;. |
| created\_at | Timestamp || Time when the account was created. |
| updated\_at | Timestamp || Time when the account was last updated. |

**Players**

| **Attribute Name** | **Type** | **Key** | **Description** |
| --- | --- | --- | --- |
| Player\_ID | String | PK | Unique identifier for each user of the system. This is will be their unique in-game username. |
| Country | String || The country that the player belongs to. |
| Name | String | N/A | The Player&#39;s full name. |
| Twitter | String | N/A | The Player&#39;s Twitter handle e.g. @PlayerXYZ |
| Discord | String | N/A | The Player&#39;s Discord username e.g. @PlayerXYZ#1234 |
| Team\_ID | String | FK | The team that this Player belongs to. |
| Wins | Int | N/A | The total number of matches the player has won. |
| Losses | Int | N/A | The total number of matches the player has lost. |
| Rating | Float | N/A | The rating for the Player as a number – generated by a process using data from their previous matches. |

**Teams**

| **Attribute Name** | **Type** | **Key** | **Description** |
| --- | --- | --- | --- |
| Team\_ID | String | PK | Unique identifier for each team in the system. |
| Name | String | N/A | The full, official name of the team. |
| Name\_Abbreviation | String | N/A | The abbreviated team name. E.g. Fnatic =\&gt; FNTC. |
| Coach\_Name | String | N/A | The full name of the main coach. |
| Country | String | N/A | The country of origin for the team. |
| Rating | Float | N/A | The rating for the team as a number – generated by a process using data from their previous matches. |
| Twitter | String | N/A | The Team&#39;s Twitter handle. E.g. @TeamXYZ |
| PrimarySponsor | String | N/A | The main sponsor for the team. E.g. Corsair® or Intel® |
| SecondarySponsor | String | N/A | The secondary sponsor for the team. This can be set to NULL if there is no secondary sponsor. |

**Matches**

| **Attribute Name** | **Type** | **Key** | **Description** |
| --- | --- | --- | --- |
| Match\_ID | String | PK | Unique identifier for each match in the system. |
| Team1\_ID | String | FK | The Team\_ID of the first team in the match. |
| Team\_2\_ID | String | FK | The Team\_ID of the second team in the match. |
| Parent\_Match\_ID | String | FK | The ID of the match following on from this one. Acts as a pointer. |
| Date\_Time | Datetime | N/A | The Date/Time the match was scheduled for. |
| Start\_Time | Datetime | N/A | The Date/Time the match started. |
| End\_Time | Datetime | N/A | The Date/Time the match ended. |
| Team1\_Score | Int | N/A | The score for Team1. |
| Team2\_Score | Int | N/A | The Score for Team2. |

###External API

Most data stored in the database tables will be accessible through an external API, meaning other processes/applications can request data. The &quot;EOS-API&quot; will accept all GET requests for matches, teams and players – but not return any personal data such as full names or passwords etc.

All GET Requests can be accessed using the following endpoints:

| Endpoint | Request Type | Description |
| --- | --- | --- |
| /api/status | GET | Returns the overall status of the system. |
| /api/teams | GET | Returns an array of all teams and their data. |
| /api/teams/{{team\_id}} | GET | Returns details for a specific team. |
| /api/matches | GET | Returns an array of all matches and their data. |
| /api/matches/{{match\_id}} | GET | Returns details for a specific match. |
| /api/players | GET | Returns an array of all players and their data – but not their personal data. |
| /api/players/{{player\_id}} | GET | Returns details for a specific player – but not their personal data. |
