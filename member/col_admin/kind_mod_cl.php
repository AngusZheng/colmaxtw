<?php
ob_start();
include("config.php");

//參數

$kind_name =$_POST["kind_name"];
$kinds1 = $_POST["kinds1"];
$id = $_POST["id"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update kind_name set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="kind.php"</script>'; 
}
}
else{
$sql= "update kind_name set kind_name= '$kind_name' , kinds1='$kinds1'  where id = '$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="kind.php"</script>'; 
}
}

ob_end_flush();
?>