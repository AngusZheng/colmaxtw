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

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update vendor set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('停用成功');</script>");
echo '<script>location.href="vendor.php"</script>'; 
}
}

else
{
$id=$_GET["id"];	
$sql = "update vendor set del = 0 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('啓用成功');</script>");
echo '<script>location.href="vendor.php"</script>'; 
}	
	
}


?>