<?php
ob_start();
include("../config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$kind = $_POST["kind"];
$vender=$_POST["vender"];
$content= $_POST["content"];
$sql= "insert into vender_content (content,kind,vender) values ('$content','$kind','$vender')";
mysql_query($sql);


echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="vender_list.php"</script>'; 

ob_end_flush();
?>