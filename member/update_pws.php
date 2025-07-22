<?php
include("config.php"); //包含文件

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from cust ";
$conn=mysql_query($sql); 	
while($row=mysql_fetch_array($conn)){	
 $sql="update cust set user_name='".$row["taxnum"]."',password = '".$row["taxnum"]."' where id = '".$row["id"]."'";

 $result=mysql_query($sql); 	
}

?>