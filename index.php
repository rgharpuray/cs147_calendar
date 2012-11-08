<!doctype html>
<?php
include "helpers.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GameTime</title>
    <meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
    <script src="jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
    <script src="jquery.mobile-1.2.0.js"></script>
</head>
<body>
 <div data-role="header">
    <h1>GameTime</h1>
</div>

	<?php
		$games = get_games_for_user_with_id(1);
		while($row = mysql_fetch_array($games))
		{
	?>

<div class="accordion">
    <?php $home_team = get_home_logo($row['home_team_id']); ?>
    <?php $away_team = get_away_logo($row['away_team_id']); ?>
    <h3><a href="#"><img class="home-team-logo" src = "images/<?php echo str_replace('"', "", $home_team); ?>"/>
		<p class="game-date"><?php echo $row['gamedate'] ?></p>
        <p class="game-date"><?php echo $row['gametime']?></p>
		<img class="away-team-logo" src = "images/<?php echo str_replace('"', "", $away_team); ?>"/></a></h3>
    <div>
        <p style="width:400px;">
        	<?php
        	$home_team_players = get_players_for_team_by_id($row['home_team_id']);
			while($home_player = mysql_fetch_array($home_team_players))
			{
				echo '<b class="info_header">' . $home_player['name'] . '</b></br>';	
			}

			$away_team_players = get_players_for_team_by_id($row['away_team_id']);
			while($away_player = mysql_fetch_array($away_team_players))
			{
				echo '<b class="info_header_alt">' . $away_player['name'] . '</b></br>';	
			}
        	?>
        </p>
    </div>
    
</div>
	<?php
		}
	?>

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="subscriptions.php" rel="external" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" rel="external" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="maps.php" rel="external" id="map" data-icon="custom">Maps</a></li>
			<li><a href="players.php" rel="external" id="players" data-icon="custom">Players</a></li>
		</ul>
		</div>
	</div>
 
<script>
    $(".accordion").accordion({
        active: false
        });
    $(".accordion").accordion({
        collapsible: true
        });
</script>
 

</body>
</html>