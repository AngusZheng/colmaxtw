<?php
ob_start();
include("config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$kind_name = $_POST["kind_name"]; 
$top=$_POST["top"];
$vendor = $_POST["vendor"];
$sql= "insert into kind (kind_name,vendor,top) values ('$kind_name','$vendor','$top')";
$result=mysql_query($sql);

if($result){
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="kind_new.php"</script>'; 
}
ob_end_flush();
?>