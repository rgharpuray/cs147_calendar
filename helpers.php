<?php
session_start();
include 'db_connect.php';
date_default_timezone_set('America/Los_Angeles');

function get_home_name($row1)
{
    $home_team = mysql_query("SELECT name FROM team where id = $row1");
    while($team = mysql_fetch_array($home_team))
    {
        return $team['name'];
    }
}

function get_away_name($row1)
{
    $home_team = mysql_query("SELECT name FROM team where id = $row1");
    while($team = mysql_fetch_array($home_team))
    {
        return $team['name'];
    }
}

function get_home_address($row1)
{
    $home_team = mysql_query("SELECT address FROM team where id = $row1");
    while($team = mysql_fetch_array($home_team))
    {
        return $team['address'];
    }
}


function get_home_logo($row1)
{
    $home_team = mysql_query("SELECT logourl FROM team where id = $row1");
    while($team = mysql_fetch_array($home_team))
    {
        return $team['logourl'];
    }
}

function get_away_logo($row1)
{
    $home_team = mysql_query("SELECT logourl FROM team where id = $row1");
    while($team = mysql_fetch_array($home_team))
    {
        return $team['logourl'];
    }
}

function get_players()
{
	$players = mysql_query("SELECT * FROM player");
	return $players;
}

function get_players_for_team_by_id($team_id)
{
	$players = mysql_query("SELECT * FROM player where team_id = $team_id");
	return $players;
}

function get_nfl_teams_user_has_subscribed_to()
{
	$current_user_id = $_SESSION['id'];
	$nfl_teams = mysql_query("SELECT * FROM team where league = 'nfl' and id in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $nfl_teams;
}

function get_nfl_teams_user_hasnt_subscribed_to() 
{
	$current_user_id = $_SESSION['id'];
	$nfl_teams = mysql_query("SELECT * FROM team where league = 'nfl' and id not in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $nfl_teams;
}

function get_nba_teams_user_has_subscribed_to()
{
	$current_user_id = $_SESSION['id'];
	$nba_teams = mysql_query("SELECT * FROM team where league = 'nba' and id in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $nba_teams;
}

function get_nba_teams_user_hasnt_subscribed_to() 
{
	$current_user_id = $_SESSION['id'];
	$nba_teams = mysql_query("SELECT * FROM team where league = 'nba' and id not in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $nba_teams;
}

function get_mlb_teams_user_has_subscribed_to()
{
	$current_user_id = $_SESSION['id'];
	$mlb_teams = mysql_query("SELECT * FROM team where league = 'mlb' and id in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $mlb_teams;
}

function get_mlb_teams_user_hasnt_subscribed_to() 
{
	$current_user_id = $_SESSION['id'];
	$mlb_teams = mysql_query("SELECT * FROM team where league = 'mlb' and id not in (select team_id from user_subscribesto_team where user_id = $current_user_id)");
	return $mlb_teams;
}

function subscribe_user_to_team($team_id)
{
	$current_user_id = $_SESSION['id'];
	$insert_query="INSERT INTO user_subscribesto_team(team_id, user_id) values($team_id, $current_user_id)";
	mysql_query($insert_query);
	return;
}

function unsubscribe_user_to_team($team_id)
{
	$current_user_id = $_SESSION['id'];
	$delete_query="DELETE FROM user_subscribesto_team where team_id = $team_id and user_id = $current_user_id";
	mysql_query($delete_query);
	return;
}

function user_subscribes_to_team_with_id($team_id)
{
	$current_user_id = $_SESSION['id'];
	$subscription = mysql_query("SELECT * FROM user_subscribesto_team where user_id = $current_user_id and team_id = $team_id");
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
	$current_user_id = $_SESSION['id'];
	$subscription = mysql_query("SELECT * FROM user_subscribesto_team where user_id = $current_user_id and team_id in (select id from team where name = '$team_name')");
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

function get_games_for_user_with_id($userid)
{
	$current_user_id = $_SESSION['id'];
	$games = mysql_query("SELECT * FROM game where home_team_id in (select id from team where id in (select team_id from user_subscribesto_team where user_id = $current_user_id))  or away_team_id in (select id from team where id in (select team_id from user_subscribesto_team where user_id = $current_user_id)) order by gamedate,gametime");
	return $games;
	
}

function get_users_name()
{  
	$current_user_id = $_SESSION['id'];
	$user = mysql_query("SELECT name FROM user where id = $current_user_id");
	while($usr = mysql_fetch_array($user))
	{
		return $usr['name'];
	}
}



?>