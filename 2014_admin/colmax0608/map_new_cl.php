<?php
ob_start();
include("../config.php");

//參數
$custname = $_POST["custname"];
$address =$_POST["address"];
$county = $_POST["county"];
$vendor=$_POST["vendor"];
$tel = $_POST["tel"];
$lat = $_POST["lat"];
$lng=$_POST["lng"];


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql= "insert into map_vendor (custname,address,vendor,county,tel,lat,lng)  values('$custname','$address','$vendor','$county','$tel','$lat','$lng')";
$result = mysql_query($sql);



if($result)
{
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="index.php?vendor='.$vendor.'"</script>'; 
}


ob_end_flush();
?>