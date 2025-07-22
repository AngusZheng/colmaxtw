<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<form action="gecode.php" method="post" name="form1" id="form1" class="style2" enctype="multipart/form-data">
地址:<input name="address" size="35" value="<?=$_POST["address"]?>" type="text" style="font-size:14px;">
<input name="Submit" value="查詢" type="submit">
</form>

<?php
if($_POST["address"])
{
$coord=getLatLong($_POST["address"]);
echo "lat:".$lat=$coord['lat']."<br>";
echo "lng:".$lng=$coord['lng'];
 	
}
?>

<?php
function getLatLong($address){
	
    $addr_str_encode = urlencode($address);
    $url = "http://maps.googleapis.com/maps/api/geocode/json"
        ."?sensor=false&language=zh-TW&region=tw&address=".$addr_str_encode;
    $geo = file_get_contents($url);
    $geo = json_decode($geo,true);
    $geo_status = $geo['status'];
    //echo "$addr_str $geo_status\n";
    if($geo_status=="OVER_QUERY_LIMIT"){ die("OVER_QUERY_LIMIT"); }
    if($geo_status!="OK") continue;
     
    $geo_address = $geo['results'][0]['formatted_address'];
    $num_components = count($geo['results'][0]['address_components']);
    //郵遞區號、經緯度
    $geo_zip = $geo['results'][0]['address_components'][$num_components-1]['long_name'];
    $geo_lat = $geo['results'][0]['geometry']['location']['lat'];
    $geo_lng = $geo['results'][0]['geometry']['location']['lng'];
    $geo_location_type = $geo['results'][0]['geometry']['location_type'];
	
	$coord=array();
	$coord['lat']=$geo_lat;
	$coord['lng']=$geo_lng;
	
	return $coord;
}
?>
</body>
</html>