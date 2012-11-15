<?php
include 'db_connect.php';
include 'helpers.php';

$team_id = $_POST['team_id'];

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

?>