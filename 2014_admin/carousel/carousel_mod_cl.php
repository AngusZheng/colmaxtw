<?php
ob_start();
include("../config.php");

//參數

$link =$_POST["link"];
$remarks = $_POST["remarks"];
$brand_name = $_POST["brand_name"];
$id = $_POST["id"];
$delete = $_GET["delete"];

//database
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

if ($delete ==1)
{
$id=$_GET["id"];	
$sql = "update carousel set del = 1 where id ='$id'";

$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('刪除成功');</script>");
echo '<script>location.href="carousel_list.php"</script>'; 
}
}
else{
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=$id.".png";
$path=dirname(dirname(dirname(__FILE__))).'/images/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "update carousel set link= '$link' , remarks='$remarks',pic_name = '$file',brand_name='$brand_name' where id = '$id'";
}
else
$sql= "update carousel set link= '$link' , remarks='$remarks' ,brand_name='$brand_name'  where id = '$id'";



$result = mysql_query($sql);

if($result)
{
echo ("<script type='text/javascript'> alert('修改成功');</script>");
echo '<script>location.href="carousel_list.php"</script>'; 
}
}

ob_end_flush();
?>