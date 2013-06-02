
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
<script type="text/javascript"> 
    $(document).ready(function() { initialize(); });
	<?php
	

	?>
    function initialize() {
        var map_options = {
            center: new google.maps.LatLng(27.42,87.55),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var google_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

        var info_window = new google.maps.InfoWindow({
            content: 'loading'
        });

        var t = [];
        var x = [];
        var y = [];
        var h = [];
	<?php
	include("variables.php");
	$conn=mysql_connect("localhost",$DBUSER,$DBPASS);
	mysql_select_db($DBNAME,$conn);	
	$q="select * from maptags";
	$r=mysql_query($q);
	while($a=mysql_fetch_array($r))
	{
		
        	$loc=$a['name'];
		$orig=$a['original_name'];
		$lat=$a['latitude'];
		$long=$a['longitude'];
		if($loc!="Not yet assigned")
		{	
			echo "t.push('$loc');";
        		echo "x.push($lat);";
        		echo "y.push($long);";
        		echo "h.push('<p><strong>$loc</strong><br/>Original Name : $orig</p>');";
		}
	}
	?>

        var i = 0;
        for ( item in t ) {
            var m = new google.maps.Marker({
                map:       google_map,
                animation: google.maps.Animation.DROP,
                title:     t[i],
                position:  new google.maps.LatLng(x[i],y[i]),
                html:      h[i]
            });

            google.maps.event.addListener(m, 'click', function() {
                info_window.setContent(this.html);
                info_window.open(google_map, this);
            });
            i++;
        }
    }
</script> 
<div id="map_canvas" style="width:1000px;height:300px;">Google Map</div>
