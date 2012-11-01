<!DOCTYPE html> 
<?php

include 'helpers.php';

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

	$(function() {
		$(".nfl-teams").show();
		$(".mlb-teams").hide();
		$(".nba-teams").hide();
		$("#nfl").css("opacity", 1.0);
		$(".team-item-subscribed").click(function() {
			e.stopPropagation();
			return false;
			
			$(this).css('background-color', 'black');
			alert('here');
		});
	});
	
	function toggleNBA() {
		$("#nba").css("opacity", 1.0);
		$("#mlb").css("opacity", 0.3);
		$("#nfl").css("opacity", 0.3);
		
		$(".nfl-teams").hide();
		$(".mlb-teams").hide();
		$(".nba-teams").show();
	}
	
	function toggleMLB() {
		$("#mlb").css("opacity", 1.0);
		$("#nba").css("opacity", 0.3);
		$("#nfl").css("opacity", 0.3);

		$(".nfl-teams").hide();
		$(".mlb-teams").show();
		$(".nba-teams").hide();
	}
	
	function toggleNFL() {
		$("#nfl").css("opacity", 1.0);
		$("#nba").css("opacity", 0.3);
		$("#mlb").css("opacity", 0.3);
		
		$(".nfl-teams").show();
		$(".mlb-teams").hide();
		$(".nba-teams").hide();
	}
	
	function moreDetail(moreDetail)
	{
		alert(moreDetail.parentNode.parentNode.className);
		var div = moreDetail.parentNode.parentNode;
		div.style.height = '100px';
		div.style.background = "rgb()"
	}
	
</script>

<body> 


<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <h1>Subscriptions</h1>
</div>

	<div data-role="content">	

	<div class="league-selectors">
		<span class="league-icon-container"><img class="league-icon" id="nfl" src="http://sportsmediamasters.com/smm/wp-content/uploads/2012/04/NFL-logo.gif" onclick="toggleNFL();" ></span>
		<span class="league-icon-container"><img class="league-icon" id="mlb" src="http://mlbblogger.files.wordpress.com/2012/02/mlb.jpg" onclick="toggleMLB();"></span>
		<span class="league-icon-container"><img class="league-icon" id="nba" src="http://userserve-ak.last.fm/serve/_/33466295/nba+254px_Logosvg.png" onclick="toggleNBA();"></span>
	</div>

	<div class="nfl-teams">
		<?php
		$subscribed_nfl_teams = get_nfl_teams();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed">
			<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>
			<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
			<p class="game-date"><?php echo $team['name'] ?> </p>
		</div>
		<?php
		}
		?>
		
	</div>
	
	<div class="nba-teams">
		<?php
		$subscribed_nfl_teams = get_nba_teams();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed">
			<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>
			<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
			<p class="game-date"><?php echo $team['name'] ?> </p>
		</div>
		<?php
		}
		?>
	</div>
	  
	<div class="mlb-teams">
		<?php
		$subscribed_nfl_teams = get_mlb_teams();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed">
			<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>
			<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
			<p class="game-date"><?php echo $team['name'] ?> </p>
		</div>
		<?php
		}
		?>
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
			<li><a href="subscriptions.php" id="nfl" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" id="home" data-icon="custom">Calendar</a></li>
			<li><a href="#" id="key" data-icon="custom">Maps</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
