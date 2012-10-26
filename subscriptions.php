<?p<!DOCTYPE html> 
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
		$(".calendar-item").click(function() {
			if($(this).css("background-color") == 'rgb(8, 50, 66)')
			{
				$(this).css("background-color", "green");
				$(this).css("height", "200px");
				$(this).append('<p class="more-game-info">More info about the game! </p>');
			}
			else
			{
				$(this).css("background-color", 'rgb(8, 50, 66)');
				$(this).css("height", "60px");
				$(".more-game-info").remove();
			}
		});
	})
</script>

<body> 


<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <a href="index.php" data-icon="star">Done</a>
    <h1>Subscriptions</h1>
</div>

	<div data-role="content">	

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
		<p class="game-date">Minnesota Vikings </p>
		
	</div>

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://seahawks.sportspressnw.com/files/2010/01/seahawks_logo-bevel_bg_16001.jpg"/>
		<p class="game-date">Seattle Seahawks</br>
		</p>
	</div>

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://images.pictureshunt.com/pics/c/cincinnati_bengals_logo-9085.gif"/>
		<p class="game-date">Cincinatti Bengals</p>
	</div>
	

	
	
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="d">
		<ul>
			<li><a href="#" id="nfl" data-icon="custom">NFL</a></li>
			<li><a href="#" id="home" data-icon="custom">NHL</a></li>
			<li><a href="#" id="key" data-icon="custom">NBA</a></li>
			<li><a href="#" id="beer" data-icon="custom" >MLB</a></li>
			<li><a href="#" id="skull" data-icon="custom" class="ui-btn-active">MLS</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
