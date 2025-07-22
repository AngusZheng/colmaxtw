<?php
ob_start();
include("../config.php");

//參數
date_default_timezone_set("Asia/Taipei");
$title =$_POST["title"];
$price = $_POST["price"];
$price2 = $_POST["price2"];
$id = $_POST["id"];
$kind=$_POST["kind"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==2)
{
$id=$_GET["id"];	
$del=$_GET["del"];	
$hide2=$_GET["hide2"];	
$sql = "update bonus set del = '$del' where id ='$id'";
$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('已".$hide2."');</script>");
echo '<script>location.href="bonus_list.php"</script>'; 
}
}

elseif ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update bonus set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="bonus_list.php"</script>'; 
}
}

else{
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/bonus/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update bonus set title= '$title' , price='$price',photo = '$file' ,price2='$price2',kind='$kind'  where id = '$id'";
$result = mysql_query($sql);
}
else{
$sql= "update bonus set title= '$title' , price='$price' ,price2='$price2',kind='$kind'   where id = '$id'";
$result = mysql_query($sql);
}
if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="bonus_list.php"</script>'; 
}
}

ob_end_flush();
?>