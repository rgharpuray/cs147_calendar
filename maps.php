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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAeIJsJBXmgBfA2qP-zPdjNcbwD3G7sqdc&sensor=true" type="text/javascript"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
    <script src="jquery.ui.map.full.min.js" type="text/javascript"></script
    <script type="text/javascript" src="jquery.ui.map.js"></script>
    <script type="text/javascript" src="jquery.ui.map.extensions.js"></script>

	

<script type="text/javascript">
        $(function() {

                $('#map_canvas').gmap({'callback': function() {
	var self = this;
	self.getCurrentPosition(function(position, status) {
		if ( status === 'OK' ) {
			var clientPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			self.addMarker({'position': clientPosition, 'bounds': true});
			self.addShape('Circle', { 
				'strokeWeight': 0, 
				'fillColor': "#008595", 
				'fillOpacity': 0.25, 
				'center': clientPosition, 
				'radius': 15, 
				'clickable': false 
			});
		}
	});   
}});
        });
</script>
</head>


<body> 

<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <h1>GameTime</h1>
</div>

	<div data-role="content">	

	<div id="map_canvas" style="width:500px;height:500px"></div>
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="subscriptions.php" rel="external" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" rel="external" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="maps.php" rel="external" id="map" data-icon="custom">Maps</a></li>
			<li><a href="players.php" rel="external" id="map" data-icon="custom">Players</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>
