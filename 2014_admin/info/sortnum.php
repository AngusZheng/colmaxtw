<?php
include("../config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$id=$_POST['id'];
$num=$_POST['num'];
if($num!=0){
    $sql= "update info set sort_num=".$num." where id = '$id'";
    mysql_query($sql); 
    echo "success";
    }
?>