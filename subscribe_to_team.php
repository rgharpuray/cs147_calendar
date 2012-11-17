<?php
include 'db_connect.php';
include 'helpers.php';

$team_id = $_POST['team_id'];

if($team_id < 0)
{
	if($team_id == -1)
	{
		$league = 'nfl';
	}
	else if($team_id == -2)
	{
		$league = 'nba';
	}
	else if($team_id == -3)
	{
		$league = 'mlb';
	}
	//this is to add all NFL teams
	$teams = mysql_query("select * from team where league = '$league'");
	while($team = mysql_fetch_array($teams))
	{
		if(user_subscribes_to_team_with_id($team['id']) == 1)
		{
			//already subscribing
		}
		else
		{
			subscribe_user_to_team($team['id']);
			echo 'subscribed';
		}
	}
}

else
{
	//now we check if this subscription already exists
	if(user_subscribes_to_team_with_id($team_id) == 1)
	{
		//remove entry
		error_log("removing");
		unsubscribe_user_to_team($team_id);
		echo "unsubscribed";
	}
	else
	{
		//add entry
		error_log("adding");
		subscribe_user_to_team($team_id);
		echo 'subscribed';
	}
}

?>