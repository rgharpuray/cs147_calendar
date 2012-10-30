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

</head> 
<script>

	$(function() {
		$(".nfl-teams").show();
		$(".mlb-teams").hide();
		$(".nba-teams").hide();
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
	</div>
	
	<div class="nba-teams">
		<div class="calendar-item">
			<img class="home-team-logo" src = "http://www.goodlogo.com/images/logos/chicago_bulls_logo_3120.gif"/>
			<p class="game-date">Chicago Bulls </p>
		
		</div>

		<div class="calendar-item">
			<img class="home-team-logo" src = "http://content.sportslogos.net/logos/6/219/full/852.gif"/>
			<p class="game-date">Washington Wizards</br>
			</p>
		</div>

		<div class="calendar-item">
			<img class="home-team-logo" src = "http://upload.wikimedia.org/wikipedia/en/thumb/4/4a/Golden_State_Warriors.svg/200px-Golden_State_Warriors.svg.png"/>
			<p class="game-date">Golden State Warriors</p>
		</div>
	</div>
	  
	<div class="mlb-teams">
		<div class="calendar-item">
			<img class="home-team-logo" src = "http://upload.wikimedia.org/wikipedia/en/thumb/5/5e/SF_GiantsLogo_83_93.png/120px-SF_GiantsLogo_83_93.png"/>
			<p class="game-date">San Fransisco Giants </p>
		
		</div>

		<div class="calendar-item">
			<img class="home-team-logo" src = "http://upload.wikimedia.org/wikipedia/en/thumb/e/e9/Baltimore_Orioles_Script.svg/220px-Baltimore_Orioles_Script.svg.png"/>
			<p class="game-date">Baltimore Orioles</br>
			</p>
		</div>

		<div class="calendar-item">
			<img class="home-team-logo" src = "http://www.harvardclub.com/Images/Library/red-sox-logo.jpg"/>
			<p class="game-date">Boston Red Sox</p>
		</div>
	</div>
	

	
	
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
