<?php
ob_start();
include("config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$title = $_POST["title"];
$link= $_POST["link"];
$sql= "insert into news (title,link) values ('$title','$link')";
mysql_query($sql);


echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="news.php"</script>'; 

ob_end_flush();
?>