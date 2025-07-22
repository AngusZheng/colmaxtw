<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.js'></script>   
<script src="http://maps.google.com/maps/api/js?sensor=false&language=zh_TW" type="text/javascript"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <?php
$servername="localhost";  //localhost
$sqlservername="user31"; //user
$sqlserverpws="123456"; //password
$sqlname="colmax";// database

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from map where 1";
if($_POST["city"]<>"")
{
$sql1= " and address like '%".$_POST["city"]."%'";
/*if($_POST["county"]<>"")
$sql1= " and address like '%".$_POST["city"].$_POST["county"]."%'";*/
}
$sql=$sql.$sql1;
$conn=mysql_query($sql); 
$i=1;

?>		
      <script src="js/aj-address.js" type="text/javascript"></script>
    <script type="text/javascript"> 
        $(function () {
            $('.address-zone').ajaddress();
        });
    </script>
</head>

    <div class="address-zone">
    <form method="post" action="map.php">
        <select name="city" class="city">
			<option value="">請選擇</option>
		</select>
          <input type="submit"  value="搜尋"/>
        </form>
    </div> 
    
<div id="map" style="width: 1024px; height: 768px;"></div>


<script type="text/javascript">
var locations = [
 <?php
 while ($row=mysql_fetch_array($conn))
{ 
echo "['".trim($row["custname"])."<br>TEL:".$row["tel"]."<br>地址:".$row["address"]."',".$row["lat"].",".$row["lng"].",".$i++."],";
$lat=$row["lat"];
$lng=$row["lng"];
}
 ?>
 ['行輪企業有限公司<br>06-2712379<br><a href="http://rollingwheel.com.tw/" target="_blank">http://rollingwheel.com.tw/</a>',22.9401228,120.23973360000002,<?=$i++?>] 

];

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 11,
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
</head>
<body>
<?=$i?>
</body>
</html>