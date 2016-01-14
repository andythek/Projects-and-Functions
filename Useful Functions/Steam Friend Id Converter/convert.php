


<?php
/* 
Example Usage : Convert ID for API Request
--------------------------
| EXAMPLE FUNCTION |

function getLobbyType()
{
	$steamId = 'STEAM_1:0:123456';

	$converted = getFriendId($steamId);

	$url = 'http://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v1?key=F25EAD324D7D4FCFA026D60C7B56D3F5&appid=570&account_id='.$converted.'&matches_requested=1&format=xml';

	$match = simplexml_load_file($url);

	$matchLobbyType = $match->matches->match[1]->lobby_type;	

	echo $matchLobbyType;
}
--------------------------

*/
function getFriendId($steamId)

{

    //Test input steamId for invalid format



    //Example SteamID: "STEAM_X:Y:ZZZZZZZZ"

    $gameType = 0; //This is X.  It's either 0 or 1 depending on which game you are playing (CSS, L4D, TF2, etc)

    $authServer = 0; //This is Y.  Some people have a 0, some people have a 1

    $clientId = ''; //This is ZZZZZZZZ.



    //Remove the "STEAM_"

    $steamId = str_replace('STEAM_', '' ,$steamId);



    //Split steamId into parts

    $parts = explode(':', $steamId);

    $gameType = $parts[0];

    $authServer = $parts[1];

    $clientId = $parts[2];



    //Calculate friendId

    $result = bcadd((bcadd('76561197960265728', $authServer)), (bcmul($clientId, '2')));

    return($result);

}

?>
