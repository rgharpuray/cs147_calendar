<!DOCTYPE html> 
<?php
include "helpers.php";
?>
<html>

<head>
	<title>GameTime</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
     
	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
</head>
<script>
    var toggle = 0;
    $(function () {
        $(".calendar-item").click(function () {
            if ($(this).css("background-color") == 'rgb(8, 50, 66)' && toggle==0) {
                $(this).css("background-color", "green");
                $(this).css("height", "200px");
                $(this).append('<p class="more-game-info">More info about the game! </p>')
                toggle = 1;
            }
            else if ($(this).css("background-color") == 'rgb(8, 50, 66)' && toggle==1)
            {
                $(".calendar-item").css("background-color", 'rgb(8, 50, 66)');
                $(".calendar-item").css("height", "60px");
                $(".more-game-info").remove();
                $(this).css("background-color", "green");
                $(this).css("height", "200px");
                $(this).append('<p class="more-game-info">More info about the game! </p>')
            }
            else
            {
                $(this).css("background-color", 'rgb(8, 50, 66)');
                $(this).css("height", "60px");
                $(".more-game-info").remove();
                toggle = 0;
            }
            });
     })
</script>

<body> 


<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <h1>GameTime</h1>
</div>

	<div data-role="content">	

	<?php
		$games = get_games_for_user_with_id(1);
		while($row = mysql_fetch_array($games))
		{
	?>
	<div class="calendar-item">
        <?php $home_team = get_home_logo($row['home_team_id']); ?>
        <?php $away_team = get_away_logo($row['away_team_id']); ?>
		<img class="home-team-logo" src = "images/<?php echo str_replace('"', "", $home_team); ?>"/>
		<p class="game-date"><?php echo $row['gamedate'] ?></p>
        <p class="game-date"><?php echo $row['gametime']?></p>
		<img class="away-team-logo" src = "images/<?php echo str_replace('"', "", $away_team); ?>"/>
	</div>
	<?php
		}
	?>
	
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
			<li><a href="subscriptions.php" rel="external" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" rel="external" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="maps.php" rel="external" id="map" data-icon="custom">Maps</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
