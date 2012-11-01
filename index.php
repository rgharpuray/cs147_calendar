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

<script>
    var toggle = 0;
    $(function () {
        $(".calendar-item").click(function () {
			alert("here");
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
		<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
		<p class="game-date">Oct. 25, 8:30 p.m. EST </p>
		<img class="away-team-logo" src = "http://sezyou.files.wordpress.com/2011/01/buccaneers_logo-217194536_std.gif"/>
	</div>
	<?php
		}
	?>
	
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
			<li><a href="subscriptions.php" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="#" id="map" data-icon="custom">Maps</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
