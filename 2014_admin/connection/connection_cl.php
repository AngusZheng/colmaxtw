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
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
$link = $_POST["link1"];
$title= $_POST["title1"];
$title_eng= $_POST["title_eng1"];
move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
$sql= "insert into connection (upload_time,pic_name,link,title,title_eng) values ('$time','$file','$link','$title','$title_eng')";
mysql_query($sql);
}
//2
if(!empty($_FILES["file2"]["name"])){
$file_array=explode(".",$_FILES["file2"]["name"]);
$file=time()."_2.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
move_uploaded_file($_FILES["file2"]["tmp_name"],$path);
$link = $_POST["link2"];
$title = $_POST["title2"];
$title_eng= $_POST["title_eng2"];
$sql= "insert into connection (upload_time,pic_name,link,title,title_eng) values ('$time','$file','$link','$title','$title_eng')";
mysql_query($sql);
}
//3
if(!empty($_FILES["file3"]["name"])){
$file_array=explode(".",$_FILES["file3"]["name"]);
$file=time()."_3.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
move_uploaded_file($_FILES["file3"]["tmp_name"],$path);
$link = $_POST["link3"];
$title = $_POST["title3"];
$title_eng= $_POST["title_eng3"];
$sql= "insert into connection (upload_time,pic_name,link,title,title_eng) values ('$time','$file','$link','$title','$title_eng')";
mysql_query($sql);
}
//4
if(!empty($_FILES["file4"]["name"])){
$file_array=explode(".",$_FILES["file4"]["name"]);
$file=time()."_4.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
move_uploaded_file($_FILES["file4"]["tmp_name"],$path);
$link = $_POST["link4"];
$title = $_POST["title4"];
$title_eng= $_POST["title_eng4"];
$sql= "insert into connection (upload_time,pic_name,link,title,title_eng) values ('$time','$file','$link','$title','$title_eng')";
mysql_query($sql);
}
//5
if(!empty($_FILES["file5"]["name"])){
$file_array=explode(".",$_FILES["file5"]["name"]);
$file=time."_5.".$file_array[1];
$path=dirname(dirname(dirname(__FILE__))).'/connection/'.$file;
move_uploaded_file($_FILES["file5"]["tmp_name"],$path);
$link = $_POST["link5"];
$title = $_POST["title5"];
$title_eng= $_POST["title_eng5"];
$sql= "insert into connection (upload_time,pic_name,link,title,title_eng) values ('$time','$file','$link','$title','$title_eng')";
mysql_query($sql);
}

echo ("<script type='text/javascript'> alert('上傳成功');</script>");
echo '<script>location.href="connection_upload.php"</script>'; 

ob_end_flush();
?>