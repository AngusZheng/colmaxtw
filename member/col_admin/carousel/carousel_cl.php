<?php
ob_start();
include("../config.php");

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;
$link = $_POST["link1"];
$remarks= $_POST["remarks1"];
$brand_name = $_POST["brand_name_1"];
$kind = $_POST["kind"];

//1
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/carousel/'.$file;
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into carousel (upload_time,pic_name,link,remarks,brand_name,kind) values ('$time','$file','$link','$remarks','$brand_name','$kind')";

}
else
$sql= "insert into carousel (upload_time,link,remarks,brand_name,kind) values ('$time','$link','$remarks','$brand_name','$kind')";

$result=mysql_query($sql);

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="carousel_upload.php"</script>'; 

ob_end_flush();
?>