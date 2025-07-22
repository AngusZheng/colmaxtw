<?php
ob_start();
include("../config.php");

//參數
$map_num = $_POST["map_num"];



//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql="update map_setting set num =".$map_num." where id=1";
$result = mysql_query($sql);

if($result)
{
echo 1;
}
ob_end_flush();
?>