<?php
ob_start();
include("../config.php");

//參數
$name=$_POST["name"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql = "update info set name = '".$name."' where id =1";
$result = mysql_query($sql);

echo 1;
?>