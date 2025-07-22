<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.js'></script>   
<script src="http://maps.google.com/maps/api/js?sensor=false&language=zh_TW" type="text/javascript"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<div id="map" style="width: 1024px; height: 768px;"></div>
<script type="text/javascript">
var locations = [
 <?php
echo "['".trim($_REQUEST["custname"])."<br>TEL:".$_REQUEST["tel"]."<br>地址:".$_REQUEST["address"]."',".$_REQUEST["lat"].",".$_REQUEST["lng"].",".$i++."],";
$lat=$_REQUEST["lat"];
$lng=$_REQUEST["lng"];
 ?> 
];
var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 17,
  center: new google.maps.LatLng(<?=$lat?>, <?=$lng?>),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});


var infowindow = new google.maps.InfoWindow
({
    maxWidth: 300 ,
    maxHeight: 400
});

var marker, i;
for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    title: locations[i][0],
    zIndex: locations[i][3],
    map: map
  });
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}
</script>

<body>
</body>
</html>