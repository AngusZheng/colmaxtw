<?php
session_start();
ob_start();
include ("../config.php");
//post
$vendor = $_POST["vendor"];
$show =$_POST["showoff"];

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if($show==1){
    $sql = "update map_vendor set showoff=0 where vendor = '".$vendor."'";
}else{
    $sql = "update map_vendor set showoff=1 where vendor = '".$vendor."'";
}
$result=mysql_query($sql);
if($result){
    echo 1;
}

?>