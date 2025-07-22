<?php
ob_start();
include("config.php");

//參數

$authorized =$_POST["authorized"];
$kind = $_POST["kind"];
$id = $_POST["id"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

$sql= "update vendor set kind= '$kind' , authorized='$authorized'  where id = '$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="vendor.php"</script>'; 
}


ob_end_flush();
?>