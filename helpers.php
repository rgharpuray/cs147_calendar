<?php
session_start();
include 'db_connect.php';
date_default_timezone_set('America/Los_Angeles');


function get_nfl_teams()
{
	$nfl_teams = mysql_query("SELECT * FROM team where league = 'nfl'");
	return $nfl_teams;
}

function get_nba_teams()
{
	$nba_teams = mysql_query("SELECT * FROM team where league = 'nba'");
	return $nba_teams;
}

function get_mlb_teams()
{
	$mlb_teams = mysql_query("SELECT * FROM team where league = 'mlb'");
	return $mlb_teams;
}

?>