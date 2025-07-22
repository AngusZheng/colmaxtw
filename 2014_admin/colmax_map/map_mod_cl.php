<?php
ob_start();
include("../config.php");

//參數
$id=$_POST["id"];
$custname = $_POST["custname"];
$address =$_POST["address"];
$tel = $_POST["tel"];
$delete=$_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update map set del = 1 where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="index.php"</script>'; 
}
}

else{
$sql="update map set custname='$custname',address='$address',tel='$tel' where id = '$id'";

$result = mysql_query($sql);
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="index.php"</script>'; 
}
}

ob_end_flush();
?>