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
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
    <script src="gmap3.min.js"></script>

	<script type="text/javascript">


     $(function () {

         $('#test1').gmap3({

             getgeoloc: {
                 callback: function (latLng) {
                     if (latLng) {
                         $('#test1-result').html('localised !');
                         $(this).gmap3({
                             map: {
                                 options: { zoom: 8, center: latLng }
                             },
                             marker:
                             {
                                 values: [
                                 { latLng: latLng, options: { icon: "http://maps.google.com/mapfiles/marker_green.png"} }
                                 ]
                             }
                         });
                     } else {

                         $('#test1-result').html('not localised !');
                     }
                 }
             }
         });



     });



    </script>

    <?php
		$games = get_games_for_user_with_id(1);
		while($row = mysql_fetch_array($games))
		{
	?>
    <?php $home_address = get_home_address($row['home_team_id']); ?>
    <?php $home_team = get_home_name($row['home_team_id']); ?>
    <?php $away_team = get_away_name($row['away_team_id']); ?>

    <script type="text/javascript">
        $(function () {
        $("#test1").gmap3({
    marker:{
      address: "<?php echo $home_address?>", data:"<?php echo $home_team?> vs <?php echo $away_team?><?php echo '<br />'.$row['gamedate']?> <?php echo '<br />'.$row['gametime']?>",
      events:{
      click: function(marker, event, context){
        var map = $(this).gmap3("get"),
          infowindow = $(this).gmap3({get:{name:"infowindow"}});
        if (infowindow){
          infowindow.open(map, marker);
          infowindow.setContent(context.data);
        } else {
          $(this).gmap3({
            infowindow:{
              anchor:marker, 
              options:{content: context.data}
            }
          });
        }
      },

    }

    },


  });
        });
    </script>
	<?php
		}
	?>

</head>


<body> 

<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <h1>GameTime</h1>
</div>

	<div data-role="content">	

	<div id="test1" style="width:500px;height:500px"></div>
	</div><!-- /content -->

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
		
</div><!-- /page -->


</body>
</html>
