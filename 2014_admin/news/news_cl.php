<?php
ob_start();
include("../config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$kind = $_POST["kind"];
$content= $_POST["content"];
$sql= "insert into content (content,kind) values ('$content','$kind')";
mysql_query($sql);


echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="news_upload.php"</script>'; 

ob_end_flush();
?>