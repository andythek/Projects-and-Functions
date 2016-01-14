<php include('convert.php');?>

<?php

function getLobbyType()
{
	$steamId = 'STEAM_1:0:123456'; // As a String

	$converted = getFriendId($steamId); // Call Convert Function

	$url = 'http://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v1?key=F25EAD324D7D4FCFA026D60C7B56D3F5&appid=570&account_id='.$converted.'&matches_requested=1&format=xml'; //API call with converted ID

	$match = simplexml_load_file($url); //Load API call

	$matchLobbyType = $match->matches->match[1]->lobby_type; //Get Lobby Type	

	echo $matchLobbyType; //Echo Lobby type
}

getLobbyType();

?>
