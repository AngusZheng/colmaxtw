<?php
ob_start();
include("../config.php");

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);
$sql="select max(id) as id from carousel";
$conn=mysql_query($sql);
$result=mysql_fetch_array($conn);
//1
if(!empty($_FILES["file1"]["name"])){ 
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=($result['id']+1).".png";
$path=dirname(dirname(dirname(__FILE__))).'/images/'.$file;
$link = $_POST["link1"];
$remarks= $_POST["remarks1"];
$brand_name = $_POST["brand_name_1"];
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into carousel (upload_time,pic_name,link,remarks,brand_name) values ('$time','$file','$link','$remarks','$brand_name')";
mysql_query($sql);
}
echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="carousel_upload.php"</script>'; 

ob_end_flush();
?>