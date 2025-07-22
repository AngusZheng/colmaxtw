<?php
ob_start();
include("../config.php");

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

//左
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgne/'.$file;
$link = $_POST["link1"];
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into abgne (upload_time,pic_name,link) values ('$time','$file','$link')";
mysql_query($sql);
}
//右
if(!empty($_FILES["file2"]["name"])){
$file_array=explode(".",$_FILES["file2"]["name"]);
$file=time()."_2.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgne/'.$file;
move_uploaded_file($_FILES["file2"]["tmp_name"],$path);
$link = $_POST["link2"];
$sql= "insert into abgne (upload_time,pic_name,link,is_right) values ('$time','$file','$link',1)";
mysql_query($sql);
}


echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="abgne_upload.php"</script>'; 

ob_end_flush();
?>