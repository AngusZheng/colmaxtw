<?php
ob_start();
include("../config.php");

//參數
$id=$_POST["id"];
$custname = $_POST["custname"];
$address =$_POST["address"];
$county = $_POST["county"];
$vendor=$_POST["vendor"];
$tel = $_POST["tel"];
$lat = $_POST["lat"];
$lng=$_POST["lng"];
$remark=$_POST["remark"];
$delete=$_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update map_vendor set del = 1 where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="index.php"</script>'; 
}
}

else{
$sql="update map_vendor set custname='$custname',address='$address',county='$county',tel='$tel',vendor='$vendor',remark='$remark',lat='$lat',lng='$lng' where id = '$id'";
$result = mysql_query($sql);
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="index.php?vendor='.$vendor.'"</script>'; 
}
}

ob_end_flush();
?>