<?php
ob_start();
include("config.php");

//參數
$authorized = $_POST["authorized"];
$kind = $_POST["kind"];


//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;


$sql= "insert into vendor (kind,authorized)  values('$kind','$authorized') ";


$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('新增成功');</script>");
echo '<script>location.href="vendor.php"</script>'; 
}


ob_end_flush();
?>