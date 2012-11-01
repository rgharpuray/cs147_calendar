<?php
session_start();
include 'db_connect.php';
date_default_timezone_set('America/Los_Angeles');


function get_nfl_teams_user_has_subscribed_to()
{
	$nfl_teams = mysql_query("SELECT * FROM team where league = 'nfl' and id in (select team_id from user_subscribesto_team where user_id = 1)");
	return $nfl_teams;
}

function get_nfl_teams_user_hasnt_subscribed_to() 
{
	$nfl_teams = mysql_query("SELECT * FROM team where league = 'nfl' and id not in (select team_id from user_subscribesto_team where user_id = 1)");
	return $nfl_teams;
}

function get_nba_teams_user_has_subscribed_to()
{
	$nba_teams = mysql_query("SELECT * FROM team where league = 'nba' and id in (select team_id from user_subscribesto_team where user_id = 1)");
	return $nba_teams;
}

function get_nba_teams_user_hasnt_subscribed_to() 
{
	$nba_teams = mysql_query("SELECT * FROM team where league = 'nba' and id not in (select team_id from user_subscribesto_team where user_id = 1)");
	return $nba_teams;
}

function get_mlb_teams_user_has_subscribed_to()
{
	$mlb_teams = mysql_query("SELECT * FROM team where league = 'mlb' and id in (select team_id from user_subscribesto_team where user_id = 1)");
	return $mlb_teams;
}

function get_mlb_teams_user_hasnt_subscribed_to() 
{
	$mlb_teams = mysql_query("SELECT * FROM team where league = 'mlb' and id not in (select team_id from user_subscribesto_team where user_id = 1)");
	return $mlb_teams;
}

function subscribe_user_to_team($team_id)
{
	$insert_query="INSERT INTO user_subscribesto_team(team_id, user_id) values($team_id, 1)";
	mysql_query($insert_query);
	return;
}

function unsubscribe_user_to_team($team_id)
{
	$delete_query="DELETE FROM user_subscribesto_team where team_id = $team_id and user_id = 1";
	mysql_query($delete_query);
	return;
}

function user_subscribes_to_team_with_id($team_id)
{
	
	$subscription = mysql_query("SELECT * FROM user_subscribesto_team where user_id = 1 and team_id = $team_id");
	if(mysql_num_rows($subscription) >= 1)
	{
		return 1;
	}
	else
	{
		//subscription exists
		return 0;
	}
}

function user_subscribes_to_team($team_name)
{
	
	$subscription = mysql_query("SELECT * FROM user_subscribesto_team where user_id = 1 and team_id in (select id from team where name = '$team_name')");
	if(mysql_num_rows($subscription) >= 1)
	{
		return 1;
	}
	else
	{
		//subscription exists
		return 0;
	}
}
?>