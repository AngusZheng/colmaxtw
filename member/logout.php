<?php 
session_start();
$servername="localhost";  //localhost
$sqlservername="colmaxco_member"; //user
$sqlserverpws="colmax123456"; //password
$sqlname="colmaxco_member";// database

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");
$cust_name = $_SESSION["name"];
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql = "select * from log_info  where cust_name = '$cust_name' order by id desc limit 1";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$id= $row["id"];

$sql= "update log_info set logout_time = '$time' where id = '$id'";

$sql_s= "update cust set session_id = NULL where id = ".$_SESSION["user_name"];

$result_out=mysql_query($sql);
mysql_query($sql_s);
if($result_out)
{
session_destroy();
echo "<script>location.href='index.php';</script>";
}
?>