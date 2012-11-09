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
    <h1>Players</h1>
</div>

<ul data-role="listview" data-filter="true" class="ui-listview">
				<?php
					$players = get_players();
					while($player = mysql_fetch_array($players))
					{
				?>
				<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="index.html" class="ui-link-inherit"><?php echo $player['name']; ?></a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>

				<?php
					}
				?>
				<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-last ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="index.html" class="ui-link-inherit">Volvo</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>
			</ul>

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