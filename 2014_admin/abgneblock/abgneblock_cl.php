<?php
ob_start();
include("../config.php");

date_default_timezone_set("Asia/Taipei");
$time=date("Y-m-d H:i:s");

$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db) ;

//1
if(!empty($_FILES["file1"]["name"])){
$file_array=explode(".",$_FILES["file1"]["name"]);
$file=time()."_1.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgneblock/'.$file;
$link = $_POST["link1"];
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into abgneblock (upload_time,pic_name,link) values ('$time','$file','$link')";
mysql_query($sql);
}
//2
if(!empty($_FILES["file2"]["name"])){
$file_array=explode(".",$_FILES["file2"]["name"]);
$file=time()."_2.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgneblock/'.$file;
move_uploaded_file($_FILES["file2"]["tmp_name"],$path);
$link = $_POST["link2"];
$sql= "insert into abgneblock (upload_time,pic_name,link) values ('$time','$file','$link')";
mysql_query($sql);
}
//3
if(!empty($_FILES["file3"]["name"])){
$file_array=explode(".",$_FILES["file3"]["name"]);
$file=time()."_3.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgneblock/'.$file;
move_uploaded_file($_FILES["file3"]["tmp_name"],$path);
$link = $_POST["link3"];
$sql= "insert into abgneblock (upload_time,pic_name,link) values ('$time','$file','$link')";
mysql_query($sql);
}
//4
if(!empty($_FILES["file4"]["name"])){
$file_array=explode(".",$_FILES["file4"]["name"]);
$file=time()."_4.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgneblock/'.$file;
move_uploaded_file($_FILES["file4"]["tmp_name"],$path);
$link = $_POST["link4"];
$sql= "insert into abgneblock (upload_time,pic_name,link) values ('$time','$file','$link')";
mysql_query($sql);
}
//5
if(!empty($_FILES["file5"]["name"])){
$file_array=explode(".",$_FILES["file5"]["name"]);
$file=time."_5.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/abgneblock/'.$file;
move_uploaded_file($_FILES["file5"]["tmp_name"],$path);
$link = $_POST["link5"];
$sql= "insert into abgneblock (upload_time,pic_name,link,yuko) values ('$time','$file','$link',1)";
mysql_query($sql);
}

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="abgneblock_upload.php"</script>'; 

ob_end_flush();
?>