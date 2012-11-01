<!DOCTYPE html> 
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

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://www.wallpaperpimper.com/wallpaper/Football/Minnesota_Vikings/Minnesota-Vikings-Logo-1-NB7GN30U93-1280x1024.jpg"/>
		<p class="game-date">Oct. 25, 8:30 p.m. EST </p>
		<img class="away-team-logo" src = "http://sezyou.files.wordpress.com/2011/01/buccaneers_logo-217194536_std.gif"/>
	</div>

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://seahawks.sportspressnw.com/files/2010/01/seahawks_logo-bevel_bg_16001.jpg"/>
		<p class="game-date">Nov. 4, 1:00 p.m. EST</br>
		</p>
		<img class="away-team-logo" src = "http://footballfanstuff.com/images/San_Francisco_49ers.gif"/>
	</div>

	<div class="calendar-item">
		<img class="home-team-logo" src = "http://images.pictureshunt.com/pics/c/cincinnati_bengals_logo-9085.gif"/>
		<p class="game-date">Nov. 4, 8:20 p.m. EST </p>
		<img class="away-team-logo" src = "http://content.sportslogos.net/logos/7/162/full/857.gif"/>
	</div>
	
	<div class="calendar-item">
		<img class="home-team-logo" src = "http://cdn-wp2.gofishn.com/wp-content/uploads/2012/07/Miami-Dolphins-Logo.gif"/>
		<p class="game-date">Nov. 4, 8:20 p.m. EST </p>
		<img class="away-team-logo" src = "http://dubsism.files.wordpress.com/2010/12/st-louis-rams-logo.gif"/>
	</div>
	
	<div class="calendar-item">
		<img class="home-team-logo" src = "http://content.sportslogos.net/logos/7/165/full/406.gif"/>
		<p class="game-date">Nov. 4, 8:20 p.m. EST </p>
		<img class="away-team-logo" src = "http://images2.fanpop.com/images/photos/3900000/Logo-jacksonville-jaguars-3974893-545-434.gif"/>
	</div>
	
	
	
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
