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
<body> 

<div data-role="page" id="filter">
<!-- /header -->

	<div data-role="content">	
<canvas id="myCanvas" width="768" height="1004"></canvas>

<script>

var canvas = document.getElementById('myCanvas');
var context = canvas.getContext('2d');
var x = canvas.width /2;
var radius=100;

context.fillStyle = "rgb(0,0,0)";
context.fillRect(x-5,0,10,1004);
context.clearRect(x-50,20,100,25);
context.strokeStyle = "rg(0,0,0)";
context.strokeRect(x-50,20,100,25);
context.clearRect(x-200,70,400,100);
context.strokeRect(x-200,70,400,100);
context.clearRect(x-200,205,400,100);
context.strokeRect(x-200,205,400,100);
context.clearRect(x-200,340,400,100);
context.strokeRect(x-200,340,400,100);
context.clearRect(x-50,475,100,25);
context.strokeRect(x-50,475,100,25);
context.clearRect(x-200,535,400,100);
context.strokeRect(x-200,535,400,100);
context.clearRect(x-200,670,400,100);
context.strokeRect(x-200,670,400,100);
context.font = '18pt Helvetica';
context.fillText('Nov. 15',x-40,41);
context.fillText('Nov. 16',x-40,496);



</script>


	
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
