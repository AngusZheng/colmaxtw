<?php
ob_start();
include("config.php");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$kind_name = $_POST["kind_name"]; 
$kinds1 = $_POST["kinds1"];
$sql= "insert into kind_name (kind_name,kinds1) values ('$kind_name','$kinds1')";
$result=mysql_query($sql);

if($result){
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="kind.php"</script>'; 
}
ob_end_flush();
?>