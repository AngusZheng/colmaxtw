<?php
ob_start();
include("config.php");

//參數
$vendor=$_POST["vendor"];
$kind_name=$_POST["kind_name"];
$top=$_POST["top"];
$id = $_POST["id"];
$delete = $_GET["delete"];
$notshow = $_GET["notshow"];
$num = $_POST["num"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update kind set del = 1 where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="kind.php"</script>'; 
}
}


else{
	
$sql= "update kind set kind_name='$kind_name',vendor='$vendor' ,top='$top' ,num='$num' where id = '$id'";
$result = mysql_query($sql);
}
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="kind.php?vendor='.$vendor.'"</script>'; 
}


if($notshow==1)
{

$vendor=$_GET["vendor"];	
$sql = "update kind set notshow = 0 where vendor ='$vendor'";
$result = mysql_query($sql);

if($result)
{
echo '<script>location.href="kind.php"</script>'; 
}
}

if($notshow==0)
{

$vendor=$_GET["vendor"];	
$sql = "update kind set notshow = 1 where vendor ='$vendor'";
$result = mysql_query($sql);

if($result)
{
echo '<script>location.href="kind.php?vendor='.$vendor.'"</script>'; 
}
}


ob_end_flush();
?>