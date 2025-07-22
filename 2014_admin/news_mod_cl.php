<?php
ob_start();
include("config.php");

//參數
$title = $_POST["title"];
$link = $_POST["link"];
$id = $_POST["id"];

$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update news set del = 1 where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="news.php"</script>'; 
}
}

else{
$sql= "update news set title='$title' ,link='$link'  where id = '$id'";
$result = mysql_query($sql);
}
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="news.php"</script>'; 
}


ob_end_flush();
?>