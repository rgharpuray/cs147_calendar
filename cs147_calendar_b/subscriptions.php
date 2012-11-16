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
<script type="text/javascript">

    $(function () {


        $(".nfl-teams").show();
        $(".mlb-teams").hide();
        $(".nba-teams").hide();
        $("#nfl").css("opacity", 1.0);
        window.optimizely = window.optimizely || [];
        $(".team-item-subscribed").click(function () {
            var team_id = $(this).attr('id');
            var box = $(this);
            var dataString = "team_id=" + team_id;
            $.ajax({
                type: "POST",
                url: "subscribe_to_team.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    if (data == "subscribed") {
                        box.removeClass('team-item-unsubscribed').addClass('team-item-subscribed');
                        $("#popupPanel").popup({ transition: "fade" });
                        $("#popupPanel").popup("open");
                        setTimeout(function () { $("#popupPanel").popup("close"); }, 1000);
                        window.optimizely.push(['trackEvent', 'TEAM_SUBBED', 1000]);
                    }
                    else {
                        box.removeClass('team-item-subscribed').addClass('team-item-unsubscribed');
                        $("#popupPanel2").popup({ transition: "fade" });
                        $("#popupPanel2").popup("open");
                        setTimeout(function () { $("#popupPanel2").popup("close"); }, 1000);
                        window.optimizely.push(['trackEvent', 'TEAM_SUBBED', -1000]);
                    }
                }
            });


            returnfalse;
        });
        $(".team-item-unsubscribed").click(function () {
            var team_id = $(this).attr('id');
            var box = $(this);
            var dataString = "team_id=" + team_id;
            $.ajax({
                type: "POST",
                url: "subscribe_to_team.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    if (data == "subscribed") {
                        box.removeClass('team-item-unsubscribed').addClass('team-item-subscribed');
                        $("#popupPanel").popup({ transition: "fade" });
                        $("#popupPanel").popup("open");
                        setTimeout(function () { $("#popupPanel").popup("close"); }, 1000);
                        window.optimizely.push(['trackEvent', 'TEAM_SUBBED', 1000]);
                    }
                    else {
                        box.removeClass('team-item-subscribed').addClass('team-item-unsubscribed');
                        $("#popupPanel2").popup({ transition: "fade" });
                        $("#popupPanel2").popup("open");
                        setTimeout(function () { $("#popupPanel2").popup("close"); }, 1000);
                        window.optimizely.push(['trackEvent', 'TEAM_SUBBED', -1000]);
                    }
                }
            });

            return false;
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

    function moreDetail(moreDetail) {
        alert(moreDetail.parentNode.parentNode.className);
        var div = moreDetail.parentNode.parentNode;
        div.style.height = '100px';
        div.style.background = "rgb()"
    }

</script>

<body> 


<div data-role="page" id="filter">
    <script src="//cdn.optimizely.com/js/141455121.js"></script>
<!-- /header -->
<div data-role="header">
    <h1>Subscriptions</h1>
</div>

	<div data-role="content">	

    <div data-role="popup" id="popupPanel" data-corners="false" data-theme="none" data-shadow="false" data-tolerance="0,0">
    <div id="popupText"><p>Subscribed</p></div>
    </div>
    <div data-role="popup" id="popupPanel2" data-corners="false" data-theme="none" data-shadow="false" data-tolerance="0,0">
    <div id="popupText"><p>Unsubscribed</p></div>
    </div>

	<div class="league-selectors">
		<span class="league-icon-container"><img class="league-icon" id="nfl" src="http://sportsmediamasters.com/smm/wp-content/uploads/2012/04/NFL-logo.gif" onclick="toggleNFL();" ></span>
		<span class="league-icon-container"><img class="league-icon" id="mlb" src="http://mlbblogger.files.wordpress.com/2012/02/mlb.jpg" onclick="toggleMLB();"></span>
		<span class="league-icon-container"><img class="league-icon" id="nba" src="http://userserve-ak.last.fm/serve/_/33466295/nba+254px_Logosvg.png" onclick="toggleNBA();"></span>
	</div>

	<div class="nfl-teams">
		<?php
		$subscribed_nfl_teams = get_nfl_teams_user_has_subscribed_to();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		
		$unsubscribed_nfl_teams = get_nfl_teams_user_hasnt_subscribed_to();
		while($team = mysql_fetch_array($unsubscribed_nfl_teams))
		{
		?>
		<div class="team-item-unsubscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		?>
	</div>
	
	<div class="nba-teams">
		<?php
		$subscribed_nfl_teams = get_nba_teams_user_has_subscribed_to();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		
		$unsubscribed_nfl_teams = get_nba_teams_user_hasnt_subscribed_to();
		while($team = mysql_fetch_array($unsubscribed_nfl_teams))
		{
		?>
		<div class="team-item-unsubscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		?>
	</div>
	  
	<div class="mlb-teams">
		<?php
		$subscribed_nfl_teams = get_mlb_teams_user_has_subscribed_to();
		while($team = mysql_fetch_array($subscribed_nfl_teams))
		{
		?>
		<div class="team-item-subscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		
		$unsubscribed_nfl_teams = get_mlb_teams_user_hasnt_subscribed_to();
		while($team = mysql_fetch_array($unsubscribed_nfl_teams))
		{
		?>
		<div class="team-item-unsubscribed" id="<?php echo $team['id']; ?>">
			<!--<button data-role="button" data-inline="true" data-mini="true" onclick="moreDetail(this);">More</button>-->
			<img class="home-team-logo-sub" src = "images/<?php echo str_replace('"', "", $team['logourl']); ?>"/>
			<!--<p class="team-name"><?php echo $team['name'] ?> </p>-->
		</div>
		<?php
		}
		?>
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="d">
		<ul>
			<li><a href="subscriptions.php" data-ajax="false" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" data-ajax="false" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="maps.php" data-ajax="false" id="map" data-icon="custom">Maps</a></li>
			<li><a href="players.php" data-ajax="false" id="players" data-icon="custom">Players</a></li>
			<li><a href="register.php" data-ajax="false" id="players" data-icon="custom">Login/Register</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
