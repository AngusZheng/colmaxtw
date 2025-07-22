<?php
include("../config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql= "ALTER TABLE `carousel` ADD COLUMN `sort_num`  int(2) NOT NULL DEFAULT 0;";
mysql_query($sql); 
?>